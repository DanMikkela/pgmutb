using Microsoft.EntityFrameworkCore.Migrations;

namespace Cat_Show_Results.Migrations
{
    public partial class cat_ticket : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<int>(
                name: "CatNumber",
                table: "Tickets",
                type: "int",
                nullable: false,
                defaultValue: 0);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "CatNumber",
                table: "Tickets");
        }
    }
}
