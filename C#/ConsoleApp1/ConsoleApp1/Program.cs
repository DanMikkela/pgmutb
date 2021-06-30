using System;

namespace ConsoleApp1
{
    class Program
    {

        static void Main(string[] args)
        {
            // variabler
            string[] produktlista = new string[0];
            string inmatning = "";
            int radnum = 0;
            bool inmatningOk;

            Console.WriteLine("Avsluta inmatningen med 'exit'");

            //  hämta data tills exit skrivs in
            while (true)
            {
                Console.ForegroundColor = ConsoleColor.White;
                Console.Write("Skriv in produkt enligt 'xxx-nnn', max 10 tkn : ");
                inmatning = Console.ReadLine().Trim();

                if (inmatning.ToLower() == "exit")
                {
                    break;
                }

                inmatningOk = TestaInmatning(inmatning);
                //  spara resultat om inmatningOk
                if (inmatningOk)
                {
                radnum++ ;
                Console.ForegroundColor = ConsoleColor.Cyan;
                Console.WriteLine("\t{0} är korrekt, sparas", inmatning );
                Console.ResetColor();
                Array.Resize(ref produktlista, radnum);
                produktlista[radnum - 1] = inmatning;
                }
            }
            Console.ResetColor();
            //  skriv ut listan sorterad
            Array.Sort(produktlista);
            Console.WriteLine("- - - - - - -");
            Console.WriteLine("Sorterad produktlista:");
            for (int i = 0; i < produktlista.Length; i++)
            {
                Console.WriteLine(produktlista[i]);
            }
            Console.WriteLine("programslut");
            Console.ReadLine();
        }

        static bool TestaInmatning(string data)
        {
            string textdel;
            int deltext;
            bool numOk;

            Console.ForegroundColor = ConsoleColor.Red;

            // Tom sträng?
            if (data.ToString() == "")
            {
                Console.WriteLine("Produktnamnet saknas");
                Console.ResetColor();
                return false;
            }
            //  kontrollera formateringen
            //
            //  max 10 tkn
            if (data.Length > 10)
            {
                Console.WriteLine("För långt produktnamn");
                Console.ResetColor();
                return false;
            }
            //  skall bestå av tre delar - char+"-"+num (201-499)
            //  "-"
            deltext = data.IndexOf("-");
            if (deltext < 1)
            {
                Console.WriteLine("Produktnamnet saknar eller börjar med '-'");
                Console.ResetColor();
                return false;
            }
            //  del 1 skall vara alfabetisk
            deltext = data.IndexOf("-");

            textdel = data.Substring(0, deltext);

            for (int i = 0; i < deltext; i++)
            {
                for (int j = 0; j < 10; j++)
                {
                    if (textdel.Substring(i,1) == j.ToString() )
                    {
                        Console.WriteLine("Produktnamnet innehåller en siffra till vänster om '-'");
                        return false;
                    }
                }
             }
            //  del 3 skall vara numerisk
            textdel = data.Substring(deltext + 1);
            numOk = int.TryParse(textdel, out int svar);
            if (!numOk)
            {
                Console.WriteLine("Produktnamnet innehåller inte siffror till höger om '-'");
                return false;
            }
            if (int.Parse(textdel) < 201 || int.Parse(textdel) > 499)
            {
                Console.WriteLine("Produktnamnet ligger utan godkänt numeriskt intervall '201-499'");
                return false;
            }
            Console.ResetColor();
            return true;

        }

        static void SparaInmatning(string data, int pos)
        {

        }
    }
}