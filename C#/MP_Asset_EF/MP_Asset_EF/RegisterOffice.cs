using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore.SqlServer;

namespace MP_Asset_EF
{
    public class RegisterOffice
    {
        public static void Handler(MpContext db)
        {
            List<Country> land = db.Countries.ToList();

            while (true)
            {
                bool existOffice = false;
                Console.Clear();

                Console.WriteLine("\n** Skapar/Uppdaterar Kontor **\n");
                Skrivut.Countries(db, "VL");
                Console.Write("\nAnge Valutakod (xxx) : ");
                string input = Console.ReadLine().Trim().ToUpper();

                if (input.Length != 3)
                {
                    Error.Msg("Fel valutakod :", input);
                    break;
                }
                string tmpCurrencyCode = input;
                // kolla om land existerar
                Country co = db.Countries.Where(c => c.CurrencyCode.Contains(input)).FirstOrDefault();
                if (co == null)
                {
                    Error.Msg("Valutakod finns ej registrerad :", input);
                    break;
                }

                Console.Write("Ange Kontor : ");
                input = Console.ReadLine().Trim();
                //string tmpOffice = input;

                // sätt upp current row
                Office of = db.Offices.Where(c => c.Location.Contains(input)).FirstOrDefault();
                if ( of == null )
                {
                    of = new Office();
                }
                else
                {
                    existOffice = true;
                }

                of.Location = input;

                if (existOffice)
                {
                    db.Offices.Update(of);
                }
                else
                {
                    db.Offices.Add(of);
                }
                db.SaveChanges();
                break;
            }
        }

    }
}
