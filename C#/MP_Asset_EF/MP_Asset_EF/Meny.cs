using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    class Meny
    {
        public static void Skriv()
        {
            Console.Clear();
            Console.WriteLine("**********************************");
            Console.WriteLine("**  Menyalternativ              **");
            Console.WriteLine("**  -- Registrera / Uppdatera - **");
            Console.WriteLine("**  L  Land                     **");
            Console.WriteLine("**  K  Kontor   (kräver Land)   **");
            Console.WriteLine("**  T  Tillgång (kräver Kontor) **");
            Console.WriteLine("**  -- Listor ----------------- **");
            Console.WriteLine("**  N  Länder                   **");
            Console.WriteLine("**  O  Kontor                   **");
            Console.WriteLine("**  R  Tillgångar   (Rangering) **");
            //Console.WriteLine("**  -- Sök -------------------- **");
            //Console.WriteLine("**  S  Tillgång(ar)             **");
            Console.WriteLine("**  -- Underhåll -------------- **");
            Console.WriteLine("**  V  Läs in Valutakurser      **");
            Console.WriteLine("**  --------------------------- **");
            Console.Write("\nDitt val 'q'/Enter för slut : ");
        }
    }
}

