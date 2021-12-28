using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using Cat_Show_Results.Models;
using Microsoft.AspNetCore.Authorization;
using System.Data;

namespace Cat_Show_Results.Controllers
{
    public class TicketsController : Controller
    {
        private readonly AppDbContext _context;

        public TicketsController(AppDbContext context)
        {
            _context = context;
        }

        // GET: Tickets
        public async Task<IActionResult> Index()
        {
            return View(await _context.Tickets.Include(t => t.Cat).Where(i => !i.HaveResult).ToListAsync());

        }

        // GET: Tickets/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var ticket = await _context.Tickets
                .Include(t => t.Cat)
                .FirstOrDefaultAsync(m => m.TicketId == id);
            if (ticket == null)
            {
                return NotFound();
            }

            return View(ticket);
}

        // GET: Tickets/Create
        [Authorize(Roles = "Admin")]

        public IActionResult Create()
        {
            ViewBag.CatId = new SelectList(_context.Cats, "CatId", "Number");
            ViewBag.JudgeName = new SelectList(_context.Judges, "Name", "Name");
            Ticket ticket = new Ticket();
            ticket.TicketId = 0;
            return View(ticket);
        }

        // POST: Tickets/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("TicketId,Type,Head,Eyes,Ears,Fur,Tail,Condition,General,Result,HaveResult,JudgeName,CatNumber,CatId")] Ticket ticket)
        {
            if (ModelState.IsValid)
            {
                var cat = _context.Cats.Find(ticket.CatId);
                if (cat == null)
                {
                    return NotFound();
                }
                else
                {
                    ticket.CatNumber = cat.Number;
                }
                _context.Add(ticket);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            return RedirectToAction(nameof(Create));
        }

        // GET: Tickets/Edit/5
        [Authorize(Roles = "Admin, Judge")]
        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var ticket = await _context.Tickets.FindAsync(id);
            if (ticket == null)
            {
                return NotFound();
            }
            //    ViewData["CatId"] = new SelectList(_context.Cats, "CatId", "CatId", ticket.CatId);
            Cat currentCat = await _context.Cats.FindAsync(ticket.CatId);
            Class currentClass = await _context.Classes.FindAsync(currentCat.ClassNr);
            Breed currentBreed  = await _context.Breeds.FindAsync(currentCat.BreedId);
            ViewBag.Breed = currentBreed.Name;
            ViewBag.Titel = currentClass.Certificate;
            ViewBag.Cat = currentCat;
            ticket.CatNumber = currentCat.Number;
            ViewBag.LeftBox = "<img alt=Min src='~/Images/Min_logo100.gif' />";
            List<SelectListItem> certs = new List<SelectListItem>();
            certs.Add(new SelectListItem("", ""));
            certs.Add(new SelectListItem(currentClass.Certificate, currentClass.Certificate));
            certs.Add(new SelectListItem("Ex.1", "Ex.1"));
            certs.Add(new SelectListItem("Ex.2", "Ex.2"));
            certs.Add(new SelectListItem("Ex.3", "Ex.3"));
            certs.Add(new SelectListItem("Ex.4", "Ex.4"));
            certs.Add(new SelectListItem("Ex.", "Ex."));
            certs.Add(new SelectListItem("VG", "VG"));
            ViewData["Certificate"] = certs; 
            return View(ticket);
        }


        // POST: Tickets/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, [Bind("TicketId,Type,Head,Eyes,Ears,Fur,Tail,Condition,General,Result,JudgeName,CatNumber,CatId")] Ticket ticket)
        {
            bool result = false;

            if (id != ticket.TicketId)
            {
                return NotFound();
            }
            if (ticket.HaveResult)
            {
                result = true;
            }
            if (ticket.Result != null)
            {
                ticket.HaveResult = true;
            }
            Judge currentJudge = _context.Judges.Where(t => t.Name == ticket.JudgeName).FirstOrDefault();

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(ticket);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!TicketExists(ticket.TicketId))
                    {
                        return NotFound();
                    }
                    else
                    {
                        throw;
                    }
                }
                if (result)
                {
                    return RedirectToAction("Index", "Results");
                }
                else 
                {
                    return RedirectToAction("Index", "Judges");
                }
            }
            ViewData["CatId"] = new SelectList(_context.Cats, "CatId", "CatId", ticket.CatId);
            return View(ticket);
        }

        // GET: Tickets/Delete/5
        [Authorize(Roles = "Admin")]
        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var ticket = await _context.Tickets
                .Include(t => t.Cat)
                .FirstOrDefaultAsync(m => m.TicketId == id);
            if (ticket == null)
            {
                return NotFound();
            }

            return View(ticket);
        }

        // POST: Tickets/Delete/5

        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var ticket = await _context.Tickets.FindAsync(id);
            _context.Tickets.Remove(ticket);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool TicketExists(int id)
        {
            return _context.Tickets.Any(e => e.TicketId == id);
        }
    }
}
