using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp3
{
    public class Asset 
    {
        public string Location { get; set; }
        public string Type { get; set; }
        public DateTime PurchaseDate { get; set; }
        public string Brand { get; set; }
        public string Model { get; set; }
        public int Price { get; set; }
        public string Number { get; set; }

        public Asset(string location, string type, DateTime purchaseDate, string brand, string model, int price, string number) 
        {
            Location = location;
            Type = Type;
            PurchaseDate = purchaseDate;
            Brand = brand;
            Model = model;
            Price = price;
            Number = number;
        }

    }
}
