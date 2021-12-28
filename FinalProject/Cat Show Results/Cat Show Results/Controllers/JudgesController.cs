using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using Cat_Show_Results.Models;
using Microsoft.AspNetCore.Authorization;

namespace Cat_Show_Results.Controllers
{
    [Authorize]
    public class JudgesController : Controller
    {
        private readonly AppDbContext _context;

        public JudgesController(AppDbContext context)
        {
            _context = context;
        }

        // GET: Judges
        public async Task<IActionResult> Index()
        {
            return View(await _context.Judges.ToListAsync());
        }

        // GET: Judges/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var domare = await _context.Judges
                .FirstOrDefaultAsync(m => m.JudgeId == id);
            if (domare == null)
            {
                return NotFound();
            }

            return View(domare);
        }

        // GET: Judges/Create
        [Authorize (Roles="Admin")]
        public IActionResult Create()
        {
            return View();
        }

        // POST: Judges/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("JudgeId,Name,Country,Category1,Category2,Category3,Category4")] Judge judge)
        {
            if (ModelState.IsValid)
            {
                _context.Add(judge);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            return View(judge);
        }

        // GET: Judges/Edit/5
        [Authorize (Roles = "Admin")]
        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var domare = await _context.Judges.FindAsync(id);
            if (domare == null)
            {
                return NotFound();
            }
            return View(domare);
        }

        // POST: Judges/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, [Bind("JudgeId,Name,Country,Category1,Category2,Category3,Category4")] Judge judge)
        {
            if (id != judge.JudgeId)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(judge);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!JudgeExists(judge.JudgeId))
                    {
                        return NotFound();
                    }
                    else
                    {
                        throw;
                    }
                }
                return RedirectToAction(nameof(Index));
            }
            return View(judge);
        }

        // GET: Judges/Delete/5
        [Authorize(Roles = "Admin")]
        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var domare = await _context.Judges
                .FirstOrDefaultAsync(m => m.JudgeId == id);
            if (domare == null)
            {
                return NotFound();
            }

            return View(domare);
        }

        // POST: Judges/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var judge = await _context.Judges.FindAsync(id);
            _context.Judges.Remove(judge);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool JudgeExists(int id)
        {
            return _context.Judges.Any(e => e.JudgeId == id);
        }
    }
}
