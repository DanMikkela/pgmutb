using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public class AssetHandler
        {
        public static void DeleteAsset(MpContext db, int coID, int ofID)
        {
            Console.Clear();
            Console.WriteLine("\n** Borttag av Tillgång **\n");
            Skrivut.Countries(db, "ID");
            string input = "";
            int tmpCountry;
            while (true)
            {
                Console.Write("\nAnge ID på Land : ");
                input = Console.ReadLine().Trim();
                bool coOk = int.TryParse(input, out tmpCountry);
                // kolla om land existerar
                Country c2 = db.Countries.Where(c => c.CountryId == tmpCountry).FirstOrDefault();
                if (c2 != null)
                {
                    break;
                }
                Error.Msg("Landet finns ej :", input);
            }
            Skrivut.Offices(db, "C", tmpCountry);
            //            List<Office> ofList = db.Offices.Where(o => o.CountryId == tmpCountry).ToList();
            int tmpOffice;
            while (true)
            {
                Console.Write("Ange KontorID : ");
                input = Console.ReadLine().Trim();
                // sätt upp current office
                Office of2 = db.Offices.Where(c => c.Location.Contains(input)).FirstOrDefault();
                if (of2 != null)
                {
                    tmpOffice = of2.OfficeId;
                    break;
                }
                Error.Msg("Kontor finns inte : ", input);
           }
            // ok - nu har vi Land och Kontor
            // hämta Tillgångar på Kontoret
            List<Asset> pickedAssets = db.Assets.OrderBy(art => art.PurchaseDate).Where(a => a.OfficeId.Equals(tmpOffice)).ToList();
            if (pickedAssets.Count == 0)
            {
                Error.Msg(tmpOffice.ToString(), " saknar registrerade tillgångar.");
            }
            else
            {
                Console.WriteLine("\nFöljande tillgångar finns registrerade: ");
                Console.Write("ID".PadRight(10) + "Typ".PadRight(10) + "Märke".PadRight(10) + "Modell".PadRight(10));
                Console.WriteLine("Köpt".PadRight(12) + "Inköpspris".PadRight(15) + "Nummer".PadRight(10));

                foreach (Asset a in pickedAssets)
                {
                    Console.Write(a.AssetId.ToString().PadRight(10) + a.Type.PadRight(10) + a.Brand.PadRight(10) + a.Model.PadRight(10));
                    Console.Write(a.PurchaseDate.ToString("d").PadRight(12));
                    Console.Write("{0}", a.Price.ToString("F").PadRight(15));
                    if (a.Number != null)
                    {
                        Console.WriteLine(a.Number.PadRight(10));
                    }
                    else
                    {
                        Console.WriteLine("\n");
                    }
                }
            }

            Console.Write("Ange ID att ta bort (Ångra=enter) : ");
            input = Console.ReadLine().Trim();
            int tmpAsset;
            if (input.Length != 0)
            {
                bool assetExist = int.TryParse(input, out tmpAsset);
                if (assetExist)
                {
                    Asset art = db.Assets.Where(a => a.AssetId == tmpAsset).FirstOrDefault();
                    if (art != null)
                    {
                    db.Remove(art);
                    db.SaveChanges();
                    }
                }
                else
                {

                }
            }
        }
    }
}