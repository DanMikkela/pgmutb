using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.SqlServer;

namespace MP_Asset_EF
{
    class Program
    {

        static void Main(string[] args)
        {
            DateTime idag = new DateTime();
            idag = DateTime.Today;                                                                   // idag
            MpContext db = new MpContext();

            List<Asset> artiklar = db.Assets.ToList();

            Console.BackgroundColor = ConsoleColor.Black;
            Console.ForegroundColor = ConsoleColor.White;
            bool contStatus = true;

            while (contStatus)                                                                   //  yttre inmatningsloop
            {
                Meny.Skriv();

                ConsoleKey cmd = Console.ReadKey(true).Key;

                if (cmd == ConsoleKey.L)
                {
                    // L  Registrera Land
                    RegisterCountry.Handler(db);
                    continue;
                }
                if (cmd == ConsoleKey.K)
                {
                    // K  Registrera Kontor   (kräver Land) 
                    RegisterOffice.Handler(db);
                    Console.WriteLine("K");
                    continue;
                }
                if (cmd == ConsoleKey.T)
                {
                    // T  Registrera Tillgång (kräver Kontor)
                    RegisterAsset.Handler(db, idag);
                    artiklar = db.Assets.ToList();
                    Console.WriteLine("A");
                    continue;
                }
                if (cmd == ConsoleKey.V)
                {
                    // V  Läs in Valutakurser
                    Console.Write("Ange valutafil (ex: C:\\users\\dan\\valutor.csv) :");
                    string filnamn = Console.ReadLine();
                    if (filnamn.Length <= 0)
                    {
                        filnamn = "C:\\users\\dan\\valutor.csv";                                    // default
                    }

                    double usdExRate = ExchangeRate.Read(db, filnamn);
                    if (usdExRate == 0)
                    {
                        Error.Msg("Fel vid inläsning av Valutafil!", filnamn);
                    }
                    continue;
                }
                if (cmd == ConsoleKey.N)
                {
                    // N  Lista Länder
                    Skrivut.Countries(db, "VL");
                    continue;
                }
                if (cmd == ConsoleKey.O)
                {
                    // O  Lista Kontor
                    Skrivut.Offices(db, "All");
                    continue;
                }
                if (cmd == ConsoleKey.R)
                {
                    // R  Lista Tillgångar    (Rangering)
                    Skrivut.AssetsSorted(db, idag);
                    continue;
                }
                if (cmd == ConsoleKey.S)
                {
                    // S  Sök Tillgångar
                    Search.Asset();
                    continue;
                }

                if (cmd == ConsoleKey.Enter || cmd == ConsoleKey.Q)
                {
                    // Quit
                    Console.WriteLine("Q");
                    break;
                }
                Console.WriteLine("Ogiltigt val : " + cmd);
            }
        }
    }
}
