<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TODO LIST</title>
</head>
<body>
    <div class="container">
        <h2>TODO LIST</h2>
        <form action = "{{ url('/todo')}}" method="POST">
        @csrf
        <input type="text" class="" placeholder="title" name = "title">
        <input type="text" class="" placeholder="des" name = "des">
        <button class="btn btn-primary" type="submit">Add todo</button>
    </form>
    <table class="table">
     <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">สถานะ</th>
      <th scope="col">การกระทำ</th>
    </tr>
  </thead>
  <tbody>
    @if( $todo_lists !== null)
        @foreach($todo_lists as $index => $todo_list)
            <tr>
            <th scope="row">{{$index+1}}</th>
            <td>{{$todo_list->td_name}}</td>
             <td>
                @if($todo_list->td_status === 0)
                Not done
                @else
                Done
                @endif
            </td>
            <td class="d-flex gap-2">
            <div style="cursor: pointer">✅</div>
            <div style="cursor: pointer">🖊️</div>
            <div style="cursor: pointer">🗑️</div>
            </td>
             </tr>
        @endforeach
    @else
        <p>กรุณาส่งข้อความมาให้ด้วยครับน้องชายพี่</p>
    @endif
  </tbody>
</table>
</div>.
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script>
    const alert = () => {
        Swal.fire({
            title: "ใส่อะไรก็ใส่ไปเถอะ",
            html:
            '<input id="title" placeholder ="หัวข้อ" class="swal2-input">' +
            '<input id="des" placeholder ="คำอธิบาย" class="swal2-input">',

            showCancelButton: true,
            confirmButtonText: "สร้าง",
            showLoaderOnConfirm: true,
            preConfirm: async () => {
              try {
                 //ดึงค่า
                 const title = document.getElementById("title").value;
                 const des = document.getElementById("des").value;
                 //ส่ง req
                 const response = await fetch('/todo', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ title, des })
                  });
                //ถ้า err
              } catch (error) {
                Swal.showValidationMessage(`
                  Request failed: ${error}
                `);
              }
            },
            allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                icon: "success",
                title: `สำเร็จ`,
              });
            }
          });
    }
</script>
</html>