using System.Data.SqlClient;
using System;

namespace ConsoleAppDB
{
    class Program
    {
        static void Main(string[] args)
        {
            //  lokal SQL-Server databas
            //  Lokal dator : LAPTOP-HRM8SDK8 (local-host)
            //  Connection string : "Server=LAPTOP-HRM8SDK8\\SQLEXPRESS;Database=Northwind;Trusted_Connection=True"
            string dator = "LAPTOP-HRM8SDK8";
            string dbEngine = "\\SQLEXPRESS";
            string databas = "Northwind";
            string connType = "Trusted_Connection=True";
            string connectionString = "Server=" + dator + dbEngine + ";" + "Database=" + databas + ";" + connType;
            //  skapa objektet SqlConnection
            SqlConnection connection = new SqlConnection(connectionString);

            //  öppna förbindelsen
            connection.Open();

            //  testa förbindelsen 
            string dbName = connection.Database;
            Console.WriteLine(dbName);

            // SQL-anropet består av 2 delar, SQL + vilken databas-anslutning som ska användas
            string sql = "SELECT * FROM dbo.Customers;";
            //

            //  skapa ett anropsobjekt
            SqlCommand sqlAnrop = new SqlCommand(sql, connection);

            var resultat = sqlAnrop.ExecuteReader();
            // med "var" skapas en implicit instans av av typen SqlDataReader 


            //  skriv ut svaret
            while (resultat.HasRows)
            {
                // index 0 i GetValue ger innehållet i kolumn 0
                Console.WriteLine(resultat.GetValue(0).ToString());
            }
            resultat.Close();

            // INSERT 
            //sql = "INSERT INTO dbo.Customers (CustomerID, CompanyName) VALUES ('ADA','Bingo');";

            sql = "DELETE FROM dbo.Customers WHERE CustomerID = 'ADA';";
            // man kan ladda sql-satsen och sedan exekvera utan parametrar
            sqlAnrop.CommandText = sql;
            int antalRader = sqlAnrop.ExecuteNonQuery();
            Console.WriteLine(antalRader);

            //  avsluta med att stänga och koppla ner
            connection.Close();
            connection.Dispose();

        }
    }
}
