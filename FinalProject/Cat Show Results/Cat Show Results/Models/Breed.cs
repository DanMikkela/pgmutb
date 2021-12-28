using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.Models
{
    public class Breed
    {
        // unik nyckel MVC
        public int BreedId { get; set; }
        //
        //  databasfält
        //
        public string Name { get; set; }
        public string EMS { get; set; }
        //
        //  MVC länkningsinformation nedan
        //
        public int CategoryId { get; set; }
        public Category Categories { get; set; }

        public List<Cat> Cats { get; set; }
    }
}
