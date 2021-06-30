using System;
using System.Collections.Generic;
using System.Linq;
using System.IO;

namespace ConsoleApp3
{
    class Program
    {
        static void Main(string[] args)
        {
            DateTime idag = new DateTime();
            idag = DateTime.Today;                                                                   // idag
            DateTime endOfLife = new DateTime();
            endOfLife = idag.AddYears(-3);                                                           // end-of-life 
            DateTime varningsDatum = new DateTime();
            varningsDatum = endOfLife.AddMonths(6);                                                  //  early warning - yellow
            DateTime rangerDatum = new DateTime();
            rangerDatum = endOfLife.AddMonths(3);                                                    //  end-of-life close  - red
            bool inputStatus;

            List<Office> kontor = new List<Office>();
            //List<string> valutor = new List<string>() { "USD", "DKK", "CAN", "HKD", "SEK" };
            //List<double> exRates = new List<double>() {1, 9.1, 0.87, 1.23, 80.7};
            List<string> valutor = new List<string>();
            List<double> exRates = new List<double>();
            List<Asset> artiklar = new List<Asset>();
            List<Asset> sortAsset = new List<Asset>();
            string[] valbaraKontor =  new string[20];
            int indexOfCurrency = 0;
            string filnamn = "";
            //string[] records = new string[40];
            Console.Write("Ange valutafilen (ex: C:\\users\\dan\\valutor.csv) :");
            filnamn =  Console.ReadLine();
            if (filnamn.Length <= 0)
            {
                filnamn = "C:\\users\\dan\\valutor.csv";
            }
            //  check for file
            var fileHandler = new fileHandler(filnamn);
            //resultat = fileHandler.Hantera(filnamn);
            string[] fileRecords = File.ReadAllLines(filnamn);
            int sweIndex = 0;


            for (int i = 0; i < fileRecords.Length; i++)
            {
                string[] post = fileRecords[i].Split(";");
                valutor.Add(post[1]);
                exRates.Add(double.Parse(post[2].Replace(".", ",")));
                if (post[1] == "USD")
                {
                    sweIndex = i;
                }
            }
            // populate
            inputStatus = GetUserInput();
            //  -------------  Inmatning klar - Dags för sorterad utskrift  ---------------------
            sortAsset = artiklar.OrderBy(artiklar => artiklar.Location).ThenBy(artiklar => artiklar.PurchaseDate).ToList();
            Console.WriteLine("---------------------------------------------------------------------");
            Console.WriteLine("------- Materialförteckning -----------------------------------------");
            Console.WriteLine("---------------------------------------------------------------------");
            Console.Write("Kontor".PadRight(10) + "Typ".PadRight(10) + "Märke".PadRight(10) + "Modell".PadRight(10));
            Console.WriteLine("Köpt".PadRight(12) + "Inköpspris".PadRight(15) + "Nummer".PadRight(10));
            foreach (Asset a in sortAsset)
            {
                Console.Write(a.Location.PadRight(10) + a.Type.PadRight(10) + a.Brand.PadRight(10) + a.Model.PadRight(10));
                indexOfCurrency = GetValuta(kontor, a.Location, valutor);
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

                Console.Write("(" + valutor[indexOfCurrency] + ") " );
                double d = exRates[indexOfCurrency] * a.Price / exRates[sweIndex];
                Console.Write("{0}", d.ToString("F").PadRight(15));
                Console.WriteLine(a.Number.PadRight(10));
            }


            Console.ReadKey();
            //
            //  ---------------------------------------------------------------------------------
            //  ---------------------------------------------------------------------------------
            bool GetUserInput()
            {
                string inKat;
                var inMatning = "";
                bool contStatus = true;
                int valutaIndex = 0;

                Console.BackgroundColor = ConsoleColor.Black;
                Console.ForegroundColor = ConsoleColor.White;

                while (contStatus)                                                                   //  yttre inmatningsloop
                {
                    Console.ResetColor();
                    Console.Write("Ange Kategori  (Dator/Mobil/Kontor), 'q' to quit : ");
                    inKat = Console.ReadLine().Trim().ToLower();
                    if (inKat.ToLower() == "q")
                    {
                        break;
                    }
                    if (inKat.ToLower() != "d" && inKat.ToLower() != "m" && inKat.ToLower() != "k")
                    {
                        continue;
                    }
                    //  Om kategori = (K)ontor
                    if (inKat[0] == 'k')
                    {
                        Office off = new Office("","");
                        while (contStatus)                                                       //  inmatningsloop Kontor - Stad
                        {
                            Console.Write("Ange Kontor 'Stad' : ");
                            inMatning = Console.ReadLine().Trim();
                            string inM = inMatning.ToLower();
                            if (inM.Length == 0)
                            {
                                continue;
                            }
                            if (!CheckOfficeLocation(inMatning))
                            {
                                ErrorMsg("Felaktig Location!", inMatning);
                            }
                            else
                            {
                                break;
                            }
                        }                                                    //  inmatningsloop Kontor - Stad END
                        if (!contStatus)                                                         //  quit
                        {
                            break;
                        }
                        off.Location = inMatning;                                                //  spara Location

                        while (contStatus)                                                       //  inmatningsloop Kontor - Valuta
                        {
                            Console.Write("Välj bland : ");
                            for (int i = 0; i < valutor.Count; i++)
                            {
                                Console.Write(valutor[i] + ", ");
                            }
                            Console.Write("\nAnge Currency Code ex 'USD' : ");
                            inMatning = Console.ReadLine().Trim().ToUpper();

                            if ((valutaIndex = checkValuta(inMatning, valutor)) >= 0)
                            {
                                break;
                            }
                            else
                            {
                                ErrorMsg("Felaktig valuta angiven", inMatning);
                            }                                                                    //  inmatningsloop Kontor - Valuta END
                        }

                        off.CurrCode = inMatning;                                                //  spara Valuta

                        kontor.Add(off);                                                         //  spara Kontor
                        contStatus = false;

                    }

                    if (!contStatus)
                    {
                        contStatus = true;
                        continue;
                    }
                    // --------------  först gemensamma data  --------------------        

                    Asset ass = new Asset("n/a", "n/a", idag, "n/a", "n/a", 0, "n/a");
                    if (inKat == "m")
                    {
                        ass.Type = "Mobil";
                    }
                    else
                    {
                        ass.Type = "Dator";
                    }

                    contStatus = true;
                    while (contStatus)                                                               //  inmatningsloop Gemensam - inköpsdatum
                    {                                                                                //  med validering
                        int antalKontor = 0;
                        Console.Write("Valbara Kontor : ");
                        foreach (Office o in kontor)
                        {
                            Console.Write(o.Location+"  ");
                            valbaraKontor[antalKontor] = o.Location;
                            antalKontor++;
                        }
                        Console.WriteLine(" ");

                       contStatus = true;
                        while (contStatus)                                                           //  inmatningsloop Kontor
                        {                                                                            //  med validering
                            Console.Write("Välj Kontor : ");
                            inMatning = Console.ReadLine().Trim();
                            bool isValidKontor = false;
// ev omskrivning med LINQ
                            for (int i = 0; i < kontor.Count; i++)
                            {
                                if (inMatning.ToLower() == valbaraKontor[i].ToLower())
                                {
                                    isValidKontor = true;
                                }
                            }

                            if (!isValidKontor)
                            {
                                ErrorMsg("Felaktigt Kontor!", inMatning);
                            }
                            else
                            {
                                ass.Location = inMatning;                                            //  spara Kontor
                                contStatus = false;
                                break;
                            }
                        }
                    }                                                                                //  inmatningsloop Kontor END

                    contStatus = true;
                    while (contStatus)                                                               //  inmatningsloop Gemensam - inköpsdatum
                    {                                                                                //  med validering
                        Console.Write("Datum för köp : ");
                        inMatning = Console.ReadLine().Trim();
                        bool isValidDate = DateTime.TryParse(inMatning, out DateTime datePurchased);

                        if (!isValidDate)
                        {
                            ErrorMsg("Felaktigt Datum!", inMatning);
                        }
                        else
                        {
                            ass.PurchaseDate = datePurchased;                                        //  spara inköpsdatum
                            break;
                        }
                    }                                                                                //  inmatningsloop Gemensam - inköpsdatum END

                    Console.Write("Ange Märke : ");                                                  //  inmatning Gemensam - Märke
                    inMatning = Console.ReadLine().Trim();
                    ass.Brand = inMatning;                                                           //  spara Märke

                    Console.Write("Ange Modell : ");                                                 //  inmatning Gemensam - Modell
                    inMatning = Console.ReadLine().Trim();
                    ass.Model = inMatning;                                                           //  spara Modell

                    while (contStatus)
                    {
                        Console.Write("Ange Pris  (USD) : ");
                        inMatning = Console.ReadLine().Trim();
                        contStatus = int.TryParse(inMatning, out int resultat);
                        if (resultat <= 0 || !contStatus)
                        {
                            ErrorMsg("Angivet pris ej numeriskt/heltal.", inMatning);
                            contStatus = true;
                        }
                        else
                        {
                            ass.Price = resultat;                                                    //  spara Pris
                            break;
                        }
                    }
                    if(inKat[0] == 'm')                                                              // mobiler kan ha ett nummer
                    {
                        Console.Write("Ange mobilnummer (valfritt) : ");
                        inMatning = Console.ReadLine().Trim();
                        ass.Number = inMatning;
                    }
                    // 
                    artiklar.Add(ass);                                                                //  spara tillgång
                    //

                }                                                                                    //  yttre inmatningsloop END
                return true;
            }
            
        }

 
        static int GetValuta(List<Office> kontor, string location, List<string> valutor)
        {
            string code = "USD";

            foreach (Office o in kontor)
            {
                if (o.Location == location)
                {
                    code = o.CurrCode;
                }
            }
            for (int i = 0; i < valutor.Count; i++)
            {
                if (valutor[i] == code )
                {
                    return i;
                }
            }
            return -1;
        }

        static bool CheckOfficeLocation(string aInmatning)
        {
            if (aInmatning.Length == 0)
            {
                return false;
            }
            foreach (char c in aInmatning)
            {
                if (!char.IsLetter(c) && !char.IsWhiteSpace(c))
                {
                    return false;
                }
            }
            return true;
        }

        static int checkValuta(string aInmatning, List<string> ex)
        {
            for (int i=0; i < ex.Count; i++ )
            {
                if (aInmatning == ex[i])
                {
                    return i;
                }
            }
            return -1;
        }

        static void ErrorMsg(string m, string em)
        {
            Console.BackgroundColor = ConsoleColor.Yellow;
            Console.ForegroundColor = ConsoleColor.Red;
            Console.WriteLine(m +" : " + em);
            Console.ResetColor();
        }
    }
}
