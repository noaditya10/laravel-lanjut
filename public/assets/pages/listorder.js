function refreshData() {
    $.ajax({
        url: "/api/orders",
        method: "GET",
        dataType: "json",
        headers: { token: window.localStorage["token"] },
        success: (res) => {
            console.log(res);
            var data = res.data.data;
            var content = "";

            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                var btnHapus = `<a href='#' class='link-hapus' data-id='${item.id}'>Hapus</a>`;
                var linkEdit = `<a href='#' class='link-edit' data-id='${item.id}'>Edit</a>`;

                content += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${
                            item.order_date
                        } <br/> ${btnHapus} | ${linkEdit}</td>
                        <td>${item.product_title} </td>
                        <td>${item.price} </td>
                        <td>${item.qty} </td>
                        <td>${item.first_name} ${item.last_name}</td>

                    </tr>
                `;
            }

            $("table.table tbody").html(content);
        },
        error: (res, status, err) => {
            console.log(res);
            alert("Terjadi kesalahan");
        },
    });
}

function hapus(id) {
    $.ajax({
        url: "/api/orders/" + id,
        method: "DELETE",
        type: "json",
        headers: { token: window.localStorage["token"] },
        success: (res) => {
            alert("data order berhasil dihapus");

            refreshData();
        },
        error: (res, status, error) => {
            alert("Order gagal dihapus");
        },
    });
}

function edit(id) {
    $.ajax({
        url: "/api/orders/" + id,
        method: "GET",
        type: "json",
        headers: { token: window.localStorage["token"] },
        success: (res) => {
            console.log(res.data.product_id);
            $("#modalOrder").modal("show");
            $("input[name=id]").val(res.data.id);
            $("select[name=customer_id]").val(res.data.customer_id);
            $("select[name=product_id]").val(res.data.product_id);
            $("input[name=qty]").val(res.data.qty);
        },
        error: (res, status, error) => {
            alert("Gagal ambil data");
        },
    });
}

document.addEventListener("DOMContentLoaded", (c) => {
    refreshData();

    $("body").on("click", "a.link-hapus", (e) => {
        var c = confirm("Apakah yakin ingin hapus data?");

        if (c == true) {
            var id = $(e.currentTarget).data("id");

            hapus(id);
        }
    });

    $("body").on("click", "a.link-edit", (e) => {
        var id = $(e.currentTarget).data("id");
        edit(id);
    });
});
