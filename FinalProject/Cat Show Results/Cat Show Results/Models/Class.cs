using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.Models
{
    public class Class
    {
        // unik nyckel MVC
        public int ClassId { get; set; }
        //
        //  databasfält
        //
        public int ClassNumber { get; set; }
        public string ClassName { get; set; }
        public string Certificate { get; set; }

    }
}
