using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public static class RegisterAsset
    {
        public static void Handler(MpContext db, DateTime idag)
        {
            List<Office> kontor = db.Offices.ToList();

            //Type, PurchaseDate, Brand, Model, Price, Number
            Asset art = new Asset();
            string input = "";
            bool contStatus = true;
            Console.Clear();
            Console.WriteLine("Valbara Kontor : ");
            for (int i = 0; i < kontor.Count; i++)
            {
                for (int j = 0; j < 5 && i < kontor.Count; j++, i++)
                {
                    Console.Write(" " + kontor[i].OfficeId + " " + kontor[i].Location);
                }
                Console.WriteLine("\n");
            }

            contStatus = true;
            Office of = new Office();
            while (contStatus)                                                           //  inmatningsloop Kontor
            {                                                                            //  med validering
                Console.Write("Välj Kontor (Id) : ");
                input = Console.ReadLine().Trim();
                int idKontor = 0;
                contStatus = int.TryParse(input, out idKontor);
                // sätt upp current row
                of = db.Offices.Where(c => c.OfficeId.Equals(idKontor)).FirstOrDefault();
                if (of == null)
                {
                    Error.Msg("Kontor saknas", input);
                    continue;
                }
                art.OfficeId = idKontor;
                contStatus = false;
            }
            contStatus = true;
            while (contStatus)                                                               //  inmatningsloop Gemensam - inköpsdatum
            {                                                                                //  med validering
                Console.Write("Datum för köp : ");
                input = Console.ReadLine().Trim();
                bool isValidDate = DateTime.TryParse(input, out DateTime datePurchased);

                if (!isValidDate)
                {
                    Error.Msg("Felaktigt Datum!", input);
                }
                else
                {
                    art.PurchaseDate = datePurchased;                                        //  spara inköpsdatum
                    break;
                }
            }                                                                                //  inmatningsloop Gemensam - inköpsdatum END

            Console.Write("Ange Märke : ");                                                  //  inmatning Gemensam - Märke
            input = Console.ReadLine().Trim();
            art.Brand = input;                                                               //  spara Märke

            Console.Write("Ange Modell : ");                                                 //  inmatning Gemensam - Modell
            input = Console.ReadLine().Trim();
            art.Model = input;                                                               //  spara Modell

            while (contStatus)
            {
                Console.Write("Ange Pris  (USD) : ");
                input = Console.ReadLine().Trim();
                contStatus = int.TryParse(input, out int resultat);
                if (resultat <= 0 || !contStatus)
                {
                    Error.Msg("Angivet pris ej numeriskt/heltal.", input);
                    contStatus = true;
                }
                else
                {
                    art.Price = resultat;                                                    //  spara Pris
                    break;
                }
            }
            Console.Write("Ange Typ 'M' för Mobil, 'D' för Dator : ");
            input = Console.ReadLine().Trim().ToUpper();
            if (input[0] == 'M')
            {
                art.Type = "Mobil";
                Console.Write("Ange mobilnummer (valfritt) : ");
                input = Console.ReadLine().Trim();
                art.Number = input;
            }
            else
            {
                art.Type = "Dator";
            }
            // 
            db.Add(art);                                                                      //  spara tillgång
            db.SaveChanges();                                                                 //
        }                                                                                     //  yttre inmatningsloop END
    }
}
