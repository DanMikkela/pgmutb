using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public class Search
    {
        public static void Asset()
        {
            //  ta reda på vilken typ av sökning

            Console.Clear();
            Console.WriteLine("**********************************************");
            Console.Write("Vad vill du söka på ? (Land/Produkt/priS) : ");
            string svar = Console.ReadLine();
            bool foundString = false;
            if (svar.ToUpper().Trim() == "L")
            {
                //Console.Write("Ange Kategori  (bokstäver) : ");
                //svar = Console.ReadLine().Trim();
                //Console.ResetColor();

                ////  skriv ut

                //Console.WriteLine("\n------------------------------------------");
                //Console.WriteLine("\nProdukter osorterade. Sök:Kategori\n");
                //Console.WriteLine("Kategori".PadRight(10) + "Produkt".PadRight(15) + "Pris");

                //foreach (Produkt p in prod)
                //{
                //    if (p.Kategori == svar)
                //    {
                //        foundString = true;
                //        Console.ForegroundColor = ConsoleColor.Black;
                //        Console.BackgroundColor = ConsoleColor.Gray;
                //    }
                //    Console.Write(p.Kategori.PadRight(10));
                //    Console.ForegroundColor = ConsoleColor.White;
                //    Console.BackgroundColor = ConsoleColor.Black;
                //    Console.WriteLine(p.ProduktNamn.PadRight(15) + p.Pris);

                //}
                Console.WriteLine("\n------------------------------------------");
            }

            if (svar.ToUpper().Trim() == "P")
            {
                //Console.Write("Ange Produkt : ");
                //svar = Console.ReadLine().Trim();
                //Console.ResetColor();

                ////  skriv ut

                //Console.WriteLine("\n------------------------------------------");
                //Console.WriteLine("\nProdukter osorterade. Sök:Produkt\n");
                //Console.WriteLine("Kategori".PadRight(10) + "Produkt".PadRight(15) + "Pris");

                //foreach (Produkt p in prod)
                //{
                //    if (p.ProduktNamn == svar)
                //    {
                //        foundString = true;
                //        Console.Write(p.Kategori.PadRight(10));
                //        Console.ForegroundColor = ConsoleColor.Black;
                //        Console.BackgroundColor = ConsoleColor.Gray;
                //        Console.Write(p.ProduktNamn.PadRight(15));
                //        Console.ForegroundColor = ConsoleColor.White;
                //        Console.BackgroundColor = ConsoleColor.Black;
                //        Console.WriteLine(p.Pris);
                //    }
                //    else
                //    {
                //        Console.WriteLine(p.Kategori.PadRight(10) + p.ProduktNamn.PadRight(15) + p.Pris);
                //    }
                }
                Console.WriteLine("\n------------------------------------------");
            }

            //if ( svar.ToUpper().Trim() == "S")
            //{
                //Console.Write("Ange Pris : ");
                //svar = Console.ReadLine().Trim();
                //Console.ResetColor();

                ////  skriv ut

                //Console.WriteLine("\n------------------------------------------");
                //Console.WriteLine("\nProdukter osorterade. Sök:Pris\n");
                //Console.WriteLine("Kategori".PadRight(10) + "Produkt".PadRight(15) + "Pris");

                //foreach (Produkt p in prod)
                //{
                //    if (p.Pris.ToString() == svar)
                //    {
                //        foundString = true;
                //        Console.Write(p.Kategori.PadRight(10) + p.ProduktNamn.PadRight(15));
                //        Console.ForegroundColor = ConsoleColor.Black;
                //        Console.BackgroundColor = ConsoleColor.Gray;
                //        Console.Write(p.Pris);
                //        Console.ForegroundColor = ConsoleColor.White;
                //        Console.BackgroundColor = ConsoleColor.Black;
                //        Console.WriteLine("\n");
                //    }
                //    else
                //    {
                //        Console.WriteLine(p.Kategori.PadRight(10) + p.ProduktNamn.PadRight(15) + p.Pris);
                //    }
                //}
                //Console.WriteLine("\n------------------------------------------");
            //}

            //if (!foundString)
            //{
                //Console.ForegroundColor = ConsoleColor.Green;
                //Console.WriteLine("Sökbegrepp ej funnet i inmatad data.");
            //}
            //Console.ResetColor();

    }
}


