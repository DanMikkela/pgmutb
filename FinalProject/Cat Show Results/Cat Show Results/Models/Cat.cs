using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.Models
{
    public class Cat
    {
        // unik nyckel MVC
        public int CatId { get; set; }

        //
        //  databasfält
        //
        public int Number { get; set; }
        public string Name { get; set; }
        public string BreedName { get; set; }
        public string EMS { get; set; }
        public string Sex { get; set; }
        public DateTime Born { get; set; }
        public string ImageUrl { get; set; }
        public int ClassNr { get; set; }
        public bool IsFeatured { get; set; }
        public int Category {  get; set; }

        //
        //  MVC länkningsinformation nedan
        //
        public int BreedId { get; set; }
        public Breed Breed { get; set; }

        public List<Ticket> Tickets { get; set; }
    }
}
