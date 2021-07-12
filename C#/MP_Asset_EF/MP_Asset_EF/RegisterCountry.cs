using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.SqlServer;

namespace MP_Asset_EF
{
    public static class RegisterCountry
    {

        public static void Handler(MpContext db)
        {
            List<Country> land = db.Countries.ToList();

            while (true)
            {
                int existCountry = 1;

                Console.WriteLine("\n** Skapar/Uppdaterar Land **\n");
                Skrivut.Countries(db, "VL");
                // dags för valutakoden

                Console.Write("\nAnge Valutakod (xxx) : ");
                string input = Console.ReadLine().ToUpper().Trim();
                if (input.Length != 3)
                {
                    Error.Msg("Fel längd på valutakod", input);
                    Error.Msg("Använder 'USD'", "");
                    input = "USD";
                }
                // kolla om land existerar                                                              OBS kan ge flera träffar TODO
                Country co = db.Countries.Where(c => c.CurrencyCode.Contains(input)).FirstOrDefault();
                if ( co == null)
                { 
                    co = new Country();
                    co.CurrencyCode = input;
                    existCountry = 0;
                }

                // landsnamn
                Console.Write("Ange Landsnamn ( " + co.Name + " ) : ");
                input = Console.ReadLine().Trim();
                if (input.Length != 0)
                {
                    co.Name = input;
                }
                // växlingskurs mot USD
                Console.Write("Ange Växlingskurs (mot USD) : ");
                input = Console.ReadLine().Trim();
                input = input.Replace(".", ",");
                double exRate = 0;
                bool isValid = double.TryParse(input, out exRate);
                if (!isValid)
                {
                    Error.Msg("Fel växelkurs", input);
                    Error.Msg("Använder : ", exRate.ToString());
                }
                co.ExchangeRate = exRate;

                if (existCountry == 0)
                {
                    db.Countries.Add(co);
                }
                else
                {
                    db.Countries.Update(co);
                }
                db.SaveChanges();
                break;
            }
        } 
    }
}
