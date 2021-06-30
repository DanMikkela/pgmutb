using System;
using System.Collections.Generic;
using System.Linq;

namespace ConsoleApp2
{
    class Program
    {
        static void Main(string[] args)
        {
            //  skapa klass för Kategori och Produkt
            //  inmatning Kategory
            //  inmatning Produkt Namn
            //  inmatning Pris        
            //  avsluta med "q"
            //  skriv ut lista med Katagory/Produkt Namn/Pris
            //
            //  level 2:    sorterad utskrift asc
            //              summarad Pris i slutet
            //
            //  level 3:    använd LINQ
            //              Error handling
            //  level 4:    sökfunktion
            //
            string inKategori = "";
            string inProdukt = "";
            int inPris = 0;
            string inMatning;
            bool status = false;
            int summaPris = 0;
            List<Produkt> prod = new List<Produkt>();

            Console.WriteLine("Avsluta inmatningen med 'q'");
            Console.WriteLine("");
            while (true)
            {
                while (!status)
                {
                    Console.Write("Ange Kategori  (bokstäver) : ");
                    inMatning = Console.ReadLine().Trim();
                    if (inMatning.ToLower() == "q")
                    {
                        status = true;
                        break;
                    }
                    Console.ForegroundColor = ConsoleColor.Red;
                    if (checkAlfabetisk(inMatning))
                    {
                        inKategori = inMatning;
                        break;
                    }
                }
                Console.ResetColor();
                if (status)
                {
                    break;
                }

                while (!status)
                {
                    Console.Write("Ange Produktnamn : ");
                    inMatning = Console.ReadLine().Trim();
                    if (inMatning.Length > 0)
                    {
                        inProdukt = inMatning;
                        break;
                    }
                    Console.ForegroundColor = ConsoleColor.Red;

                }
                if (status)
                {
                    break;
                }
                Console.ResetColor();

                while (!status)
                {
                    Console.Write("Ange Pris    : ");
                    inMatning = Console.ReadLine().Trim();
                    status = int.TryParse(inMatning, out int resultat);
                    if (resultat <= 0)
                    {
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.WriteLine("Angivet pris ej numeriskt/heltal. ");
                    }
                    else
                    {
                        inPris = resultat;
                    }
                }
                status = false;
                Console.ResetColor();


                Produkt prod1 = new Produkt(inKategori, inProdukt, inPris);
                //    Console.WriteLine(inKategori + " " + inProdukt + " " + inPris);
                prod.Add(prod1);
            }
            Console.ResetColor();

            // sortera och skriv ut

            List<Produkt> prodSort = prod.OrderBy(prod => prod.Pris).ToList();
            Console.WriteLine("\n------------------------------------------");
            Console.WriteLine("\nProdukter sorterade på pris, stigande\n");
            Console.WriteLine("Kategori".PadRight(10) + "Produkt".PadRight(15) + "Pris");

            foreach (Produkt psort in prodSort)
            {
                Console.WriteLine(psort.Kategori.PadRight(10) + psort.ProduktNamn.PadRight(15) + psort.Pris);
                summaPris += psort.Pris;
            }
            Console.WriteLine(" ".PadRight(25) + "------");
            Console.WriteLine(" ".PadRight(10) + "Summa ".PadRight(15) + summaPris);

            //  sökfunktion
            Console.Write("Vill du göra en sökning på Kategori? J/N,Enter : ");
            inMatning = Console.ReadLine();
            if (inMatning.ToLower() == "j" )
            {
                DoSearch(prod);
            }

            Console.ResetColor();
            //Console.ReadLine();
        
        }

        private static void GetKategori(ref string inKategori, ref string inMatning, ref bool status)
        {
        }

        static bool checkAlfabetisk(string aInmatning)
         {
            if (aInmatning.Length == 0)
            {
                return false;
            }
            foreach (char c in aInmatning)
            {
                if (!char.IsLetter(c))
                {
                    return false;
                }
            }

            return true;
        }

        static void DoSearch(List<Produkt> prod)
        {
            //  ta reda på vilken typ av sökning
            
            Console.Write("Vad vill du söka på ? (Kategori/Produkt/priS) : ");
            string svar = Console.ReadLine();
            bool foundString = false; 
            if (svar.ToLower().Trim() == "k")
            {
                Console.Write("Ange Kategori  (bokstäver) : ");
                svar = Console.ReadLine().Trim();
                Console.ResetColor();

                //  skriv ut

                Console.WriteLine("\n------------------------------------------");
                Console.WriteLine("\nProdukter osorterade. Sök:Kategori\n");
                Console.WriteLine("Kategori".PadRight(10) + "Produkt".PadRight(15) + "Pris");

                foreach (Produkt p in prod)
                {
                    if (p.Kategori == svar)
                    {
                        foundString = true;
                        Console.ForegroundColor = ConsoleColor.Black;
                        Console.BackgroundColor = ConsoleColor.Gray;
                    }
                    Console.Write(p.Kategori.PadRight(10) );
                    Console.ForegroundColor = ConsoleColor.White;
                    Console.BackgroundColor = ConsoleColor.Black;
                    Console.WriteLine(p.ProduktNamn.PadRight(15) + p.Pris);

                }
                Console.WriteLine("\n------------------------------------------");
            }

            if (svar.ToLower().Trim() == "p")
            {
                Console.Write("Ange Produkt : ");
                svar = Console.ReadLine().Trim();
                Console.ResetColor();

                //  skriv ut

                Console.WriteLine("\n------------------------------------------");
                Console.WriteLine("\nProdukter osorterade. Sök:Produkt\n");
                Console.WriteLine("Kategori".PadRight(10) + "Produkt".PadRight(15) + "Pris");

                foreach (Produkt p in prod)
                {
                    if (p.ProduktNamn == svar)
                    {
                        foundString = true;
                        Console.Write(p.Kategori.PadRight(10));
                        Console.ForegroundColor = ConsoleColor.Black;
                        Console.BackgroundColor = ConsoleColor.Gray;
                        Console.Write(p.ProduktNamn.PadRight(15));
                        Console.ForegroundColor = ConsoleColor.White;
                        Console.BackgroundColor = ConsoleColor.Black;
                        Console.WriteLine(p.Pris);
                    }
                    else
                    {
                        Console.WriteLine(p.Kategori.PadRight(10) + p.ProduktNamn.PadRight(15) + p.Pris);
                    }
                }
                Console.WriteLine("\n------------------------------------------");
            }

            if (svar.ToLower().Trim() == "s")
            {
                Console.Write("Ange Pris : ");
                svar = Console.ReadLine().Trim();
                Console.ResetColor();

                //  skriv ut

                Console.WriteLine("\n------------------------------------------");
                Console.WriteLine("\nProdukter osorterade. Sök:Pris\n");
                Console.WriteLine("Kategori".PadRight(10) + "Produkt".PadRight(15) + "Pris");

                foreach (Produkt p in prod)
                {
                    if (p.Pris.ToString() == svar)
                    {
                        foundString = true;
                        Console.Write(p.Kategori.PadRight(10) + p.ProduktNamn.PadRight(15));
                        Console.ForegroundColor = ConsoleColor.Black;
                        Console.BackgroundColor = ConsoleColor.Gray;
                        Console.Write(p.Pris);
                        Console.ForegroundColor = ConsoleColor.White;
                        Console.BackgroundColor = ConsoleColor.Black;
                        Console.WriteLine("\n");
                    }
                    else
                    {
                        Console.WriteLine(p.Kategori.PadRight(10) + p.ProduktNamn.PadRight(15) + p.Pris);
                    }
                }
                Console.WriteLine("\n------------------------------------------");
            }

            if (!foundString)
            {
                Console.ForegroundColor = ConsoleColor.Green;
                Console.WriteLine("Sökbegrepp ej funnet i inmatad data.");
            }
            Console.ResetColor();

        }
    }

}


