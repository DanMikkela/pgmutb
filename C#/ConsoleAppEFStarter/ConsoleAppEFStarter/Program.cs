using System;

namespace ConsoleAppEFStarter
{
    class Program
    {
        static void Main(string[] args)
        {
            MyDbContext Context = new MyDbContext();
            Team Team1 = new Team();
            Team1.Name = "HIF";
            Team1.CountryId = 1;
            //Context.Teams.Add(Team1);
            //Context.SaveChanges();

            Team NewTeam;
            NewTeam = Context.Teams.Find(1);
            Console.WriteLine(NewTeam.Id);
            Console.WriteLine(NewTeam.Name);
            Console.WriteLine(NewTeam.CountryId);

            Console.WriteLine("Done");


        }
    }
}
