﻿using System;
using System.Collections.Generic;
using Bloggy.Demo.Domain;

namespace Bloggy.Demo
{
    public class App
    {
        DataAccess _dataAccess = new DataAccess();

        public void Run()
        {
            PageMainMenu();
        }

        private void PageMainMenu()
        {
            Header("Huvudmeny");

            ShowAllBlogPostsBrief();

            WriteLine("Vad vill du göra?");
            WriteLine("a) Gå till huvudmenyn");
            WriteLine("b) Uppdatera en bloggpost");
            WriteLine("c) Skapa en ny bloggpost" );
            WriteLine("d) Ta bort en bloggpost");

            ConsoleKey command = Console.ReadKey(true).Key;

            if (command == ConsoleKey.A)
                PageMainMenu();

            if (command == ConsoleKey.B)
                PageUpdatePost();

            if (command == ConsoleKey.C)
                PageCreatePost();

            if (command == ConsoleKey.D)
                PageRemovePost();
        }

        private void PageRemovePost()
        {
            Header("Ta bort");

            ShowAllBlogPostsBrief();

            Write("Vilken bloggpost vill du ta bort? ");

            int postId = int.Parse(Console.ReadLine());

            BlogPost blogpost = _dataAccess.GetPostById(postId);

            WriteLine("Tar bort : " + blogpost.Title);

            _dataAccess.RemoveBlogpost(blogpost, postId);

            Write("Bloggposten uppdaterad.");
            Console.ReadKey();
            PageMainMenu();
        }

        private void PageCreatePost()
        {
            Header("Skapa post");
            BlogPost blogpost = new BlogPost();

            Write("Skriv in titel: ");
            string newTitle = Console.ReadLine();
            blogpost.Title = newTitle;

            Write("Skriv in författare: ");
            string newAuthor = Console.ReadLine();
            blogpost.Author = newAuthor;

            _dataAccess.CreateBlogpost(blogpost);

            Write("Bloggposten uppdaterad.");
            Console.ReadKey();
            PageMainMenu();

        }

        private void PageUpdatePost()
        {
            Header("Uppdatera");

            ShowAllBlogPostsBrief();

            Write("Vilken bloggpost vill du uppdatera? ");

            int postId = int.Parse(Console.ReadLine());

            BlogPost blogpost = _dataAccess.GetPostById(postId);

            WriteLine("Den nuvarande titeln är: " + blogpost.Title);

            Write("Skriv in ny titel: ");

            string newTitle = Console.ReadLine();

            blogpost.Title = newTitle;

            _dataAccess.UpdateBlogpost(blogpost);

            Write("Bloggposten uppdaterad.");
            Console.ReadKey();
            PageMainMenu();
        }

        private void ShowAllBlogPostsBrief()
        {
            List<BlogPost> list = _dataAccess.GetAllBlogPostsBrief();

            foreach (BlogPost bp in list)
            {
                WriteLine(bp.Id.ToString().PadRight(5) + bp.Title.PadRight(30) + bp.Author.PadRight(20));
            }
            WriteLine();
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
