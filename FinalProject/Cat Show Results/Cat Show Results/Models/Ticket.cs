using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.Models
{
    public class Ticket
    {
        // unik nyckel MVC
        public int TicketId { get; set; }
        //
        //  databasfält
        //
        public string Type { get; set; }
        public string Head { get; set; }
        public string Eyes { get; set; }
        public string Ears { get; set; }
        public string Fur { get; set; }
        public string Tail { get; set; }
        public string Condition { get; set; }
        public string General { get; set; }
        public string Result { get; set; }
        public bool HaveResult { get; set; }

        //  löst kopplad länk till Judge
        public string JudgeName { get; set; }
        public int CatNumber { get; set; }

        //
        //  MVC länkningsinformation nedan
        //
        public int CatId { get; set; }
        public Cat Cat { get; set; }
    }
    
}
