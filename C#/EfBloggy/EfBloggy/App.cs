using System;
using System.Collections.Generic;
using System.Text;

namespace EfBloggy
{
    public class App
    {
        static BlogContext context = new BlogContext();

        public void Run()
        {
            //Functions.ClearDatabase();                //Körs en gång sedan kommenteras ut
            //Functions.AddSomeTitles();                //Körs en gång sedan kommenteras ut
            MainMenu();
        }
        public void MainMenu()
        {
            Header("Huvudmeny");

            ShowAllBlogPostsBrief();

            Console.WriteLine("\nWhat do you want to do?");
            Console.WriteLine("a) Gå till huvudmeny");
            Console.WriteLine("b) Skapa blogpost");
            Console.WriteLine("c) Uppdatera blogpost");
            Console.WriteLine("d) Radera blogpost");
            ConsoleKey command = Console.ReadKey(true).Key;

            if (command == ConsoleKey.A)
                MainMenu();

            if (command == ConsoleKey.B)
                PageCreatePost();

            if (command == ConsoleKey.C)
                PageUpdatePost();

            if (command == ConsoleKey.D)
                PageDeletePost();
        }

        private void PageCreatePost()
        {
            Header("Skapa");

            ShowAllBlogPostsBrief();

            //Write("\nVilken bloggpost vill du uppdatera? ");

            //int blogPostId = int.Parse(Console.ReadLine());

            //var blogPost = context.BlogPosts.Find(blogPostId);
            BlogPost nyBlogPost = new BlogPost();

            Write("Skriv in titel : ");

            string newTitle = Console.ReadLine();

            nyBlogPost.Title = newTitle;

            Write("Skriv in författare : ");

            string newAuthor = Console.ReadLine();

            nyBlogPost.Author = newAuthor;

            context.BlogPosts.Add(nyBlogPost);
            context.SaveChanges();

            Write("Bloggposten skapad.");
            Console.ReadKey();
            MainMenu();
        }

        private void PageUpdatePost()
        {
            Header("Uppdatera");

            ShowAllBlogPostsBrief();

            Write("\nVilken bloggpost vill du uppdatera? ");

            int blogPostId = int.Parse(Console.ReadLine());

            var blogPost = context.BlogPosts.Find(blogPostId);

            WriteLine("Den nuvarande titeln är : " + blogPost.Title);

            Write("Skriv in ny titel : ");

            string newTitle = Console.ReadLine();

            blogPost.Title = newTitle;

            context.BlogPosts.Update(blogPost);
            context.SaveChanges();

            Write("Bloggposten uppdaterad.");
            Console.ReadKey();
            MainMenu();
        }

        private void PageDeletePost()
        {
            Header("Radera");

            ShowAllBlogPostsBrief();

            Write("\nVilken bloggpost vill du radera? ");

            int blogPostId = int.Parse(Console.ReadLine());

            var blogPost = context.BlogPosts.Find(blogPostId);

            WriteLine("Den nuvarande titeln är : " + blogPost.Title + " av "+ blogPost.Author);

            context.BlogPosts.Remove(blogPost);
            context.SaveChanges();

            Write("Bloggposten raderad.");
            Console.ReadKey();
            MainMenu();
        }

        private void ShowAllBlogPostsBrief()
        {
            foreach (var x in context.BlogPosts)
            {
                WriteLine(x.Id.ToString().PadRight(5) + x.Title.PadRight(30) + x.Author.PadRight(20));
            }
        }

        private void Header(string text)
        {
            Console.Clear();
            Console.ForegroundColor = ConsoleColor.Green;
            Console.WriteLine();
            Console.WriteLine(text.ToUpper());
            Console.WriteLine();
        }
        private void WriteLine(string text = "")
        {
            Console.ForegroundColor = ConsoleColor.White;
            Console.WriteLine(text);
        }

        private void Write(string text)
        {
            Console.ForegroundColor = ConsoleColor.White;
            Console.Write(text);
        }
    }

}
