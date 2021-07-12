using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public class Asset
    {
        public int AssetId { get; set; }
        public string Type { get; set; }
        public DateTime PurchaseDate { get; set; }
        public string Brand { get; set; }
        public string Model { get; set; }
        public int Price { get; set; }
        public string Number { get; set; }
        // koppla upp till Office (ägare)
        public Office Office { get; set; }
        public int OfficeId { get; set; }


        public Asset(string type, DateTime purchaseDate, string brand, string model, int price, string number)
        {
            Type = type;
            PurchaseDate = purchaseDate;
            Brand = brand;
            Model = model;
            Price = price;
            Number = number;
        }

        public Asset()
        {
        }
    }
}