using Cat_Show_Results.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.ViewModels
{
    public class TicketViewModel
    {
        public IEnumerable<Ticket> AllTickets { get; set; }
        public int JudgeId { get; set; }
    }
}
