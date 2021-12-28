using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.Models
{
    public class Category
    {
        // unik nyckel MVC
        public int CategoryId { get; set; }
        //
        //  databasfält
        //
        public string Code { get; set; }
        public string Name { get; set; }

        //
        //  MVC länkningsinformation nedan
        //
        public List<Breed> Breeds  { get; set; }
    }
}
