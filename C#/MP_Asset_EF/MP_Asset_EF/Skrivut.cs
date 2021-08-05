using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public class Skrivut
    {
        public static void AssetsSorted(MpContext db, DateTime dt)
        {
            DateTime endOfLife = new DateTime();
            endOfLife = dt.AddYears(-3);                                                             // end-of-life 
            DateTime varningsDatum = new DateTime();
            varningsDatum = endOfLife.AddMonths(6);                                                  //  early warning - yellow
            DateTime rangerDatum = new DateTime();
            rangerDatum = endOfLife.AddMonths(3);                                                    //  end-of-life close  - red
            List<Country> land = db.Countries.OrderBy( co => co.Name ).ToList();
            
            List<Country> sve = db.Countries.Where( co => co.CurrencyCode.Equals("SEK")).ToList();
            double exRate = sve[0].ExchangeRate;

            Console.Clear();
            Console.WriteLine("---------------------------------------------------------------------------");
            Console.WriteLine("------- Materialförteckning -----------------------------------------------");
            Console.WriteLine("---------------------------------------------------------------------------");
            //Console.Write("Kontor".PadRight(10) + "Typ".PadRight(10) + "Märke".PadRight(10) + "Modell".PadRight(10));
            //Console.Write("Typ".PadRight(10) + "Märke".PadRight(10) + "Modell".PadRight(10));
            //Console.WriteLine("Köpt".PadRight(12) + "Inköpspris".PadRight(15) + "Nummer".PadRight(10));

            for (int i = 0; i < land.Count; i++)
            {
                double exchangeRate = land[i].ExchangeRate;
                List<Office> kontor = db.Offices.Where( o => o.CountryId.Equals(land[i].CountryId) ).ToList();

                for (int j = 0; j < kontor.Count; j++)
                {
                    Console.Write("\n" + land[i].Name + " : " + kontor[j].Location);
                    List<Asset> sortAsset = db.Assets.OrderBy(art => art.PurchaseDate).Where(a => a.OfficeId.Equals(kontor[j].OfficeId)).ToList();
                    if (sortAsset.Count == 0)
                    {
                        Console.WriteLine(" saknar registrerade tillgångar.");
                        continue;
                    }
                    else
                    {
                        Console.WriteLine("\n");
                    }
                    Console.Write("Typ".PadRight(10) + "Märke".PadRight(10) + "Modell".PadRight(10));
                    Console.WriteLine("Köpt".PadRight(12) + "Inköpspris".PadRight(15) + "Nummer".PadRight(10));

                    foreach (Asset a in sortAsset)
                    {
                        //Console.Write(kontor[j].Location.PadRight(10) + a.Type.PadRight(10) + a.Brand.PadRight(10) + a.Model.PadRight(10));
                        Console.Write( a.Type.PadRight(10) + a.Brand.PadRight(10) + a.Model.PadRight(10));

                        if (a.PurchaseDate <= varningsDatum)
                        {
                            Console.BackgroundColor = ConsoleColor.Gray;
                            Console.ForegroundColor = ConsoleColor.DarkYellow;
                        }
                        if (a.PurchaseDate <= rangerDatum)
                        {
                            Console.ForegroundColor = ConsoleColor.Red;
                        }
                        if (a.PurchaseDate <= endOfLife)
                        {
                            Console.BackgroundColor = ConsoleColor.Red;
                            Console.ForegroundColor = ConsoleColor.White;
                        }


                        Console.Write(a.PurchaseDate.ToString("d").PadRight(12));
                        Console.BackgroundColor = ConsoleColor.Black;
                        Console.ForegroundColor = ConsoleColor.White;

                        Console.Write("(" + land[i].CurrencyCode + ") ");
                        double d = land[i].ExchangeRate * a.Price / exRate;
                        Console.Write("{0}", d.ToString("F").PadRight(15));
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
            }
            Console.WriteLine("\nTryck enter för meny");
            Console.ReadLine();
        }

        public static void Countries(MpContext db, string formatting)
        {
            List<Country> land = db.Countries.ToList();
            if (formatting == "VL")
            { 
                Console.WriteLine("Existerande Valutakoder/Länder :");
                for (int i = 0; i < land.Count; i++)
                {
                    for (int j = 0; j < 5 && i < land.Count; j++, i++)
                    {
                        Console.Write(" " + land[i].CurrencyCode + ":" + land[i].Name);
                    }
                    Console.WriteLine("\n");
                }
            }
            //Console.WriteLine("\nTryck enter för meny");
            //Console.ReadLine();
        }

        public static void Offices(MpContext db, string formatting)
        {
            List<Office> kontor = db.Offices.ToList();
            if (formatting == "All")
            {
                Console.WriteLine("Existerande Valutakoder/Länder :");
                for (int i = 0; i < kontor.Count; i++)
                {
                    for (int j = 0; j < 5 && i < kontor.Count; j++, i++)
                    {
                        Console.Write(" " + kontor[i].Country + ":" + kontor[i].Location);
                    }
                    Console.WriteLine("\n");
                }
            }
            //Console.WriteLine("\nTryck enter för meny");
            //Console.ReadLine();

        }
    }
}
