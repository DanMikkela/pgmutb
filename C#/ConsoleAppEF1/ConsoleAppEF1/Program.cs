using System;

namespace ConsoleAppEF1
{
    class Program
    {
        static void Main(string[] args)
        {
            MyDbContext Context = new MyDbContext();        //  Context = kopplingarna mot databasen

            Team Team1 = new Team();
            Team1.Name = "HIF";
            Team1.CountryId = 1;
            // Id hanteras av EF som 'auto_incremental'

            Context.Teams.Add(Team1);
            //Context.SaveChanges();             // skicka till db


            // testa att hämta från db
            Team NewTeam;
            NewTeam = Context.Teams.Find(1);   // returns row with id=1
                                               // 
            Console.WriteLine(NewTeam.Id);
            Console.WriteLine(NewTeam.Name);    //etc

            Console.WriteLine("Done");
        }
    }
}
