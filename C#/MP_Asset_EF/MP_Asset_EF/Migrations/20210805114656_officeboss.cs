using Microsoft.EntityFrameworkCore.Migrations;

namespace MP_Asset_EF.Migrations
{
    public partial class officeboss : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "Boss",
                table: "Offices",
                type: "nvarchar(max)",
                nullable: true);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Boss",
                table: "Offices");
        }
    }
}
