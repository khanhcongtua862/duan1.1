// Lắng nghe sự kiện cuộn trang
window.onscroll = function() { stickyHeader() };

// Lấy header
var header = document.getElementById("myHeader");

// Lấy vị trí của header
var sticky = header.offsetTop;

// Thêm class "sticky" khi cuộn xuống, và loại bỏ class khi cuộn lên
function stickyHeader() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
