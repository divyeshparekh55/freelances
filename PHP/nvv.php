<!-- <html>
    <head>

    </head>
    <body>
        <select>
            <optgroup>
            <option>1</option>
            <option>1</option>
            <option>1</option></optgroup>

            <optgroup>
            <option>1</option>
            <option>1</option>
            <option>1</option></optgroup>
        </select>
    </body>
    https://codepen.io/surjithctly/pen/PJqKzQ
</html> -->
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
    <div class="container py-5">
    <h1 class="mb-4">Multilevel Dropdown</h1>
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> Menu </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li class="dropdown dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Multilevel Action 1</a>
                <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li class="dropdown dropend">
                        <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Multilevel Action 2</a>
                        <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu2">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
</div>
    </body>
    <script>
    let dropdowns = document.querySelectorAll('.dropdown-toggle')
dropdowns.forEach((dd)=>{
    dd.addEventListener('click', function (e) {
        var el = this.nextElementSibling
        el.style.display = el.style.display==='block'?'none':'block'
    })
})
</script>
</html>



