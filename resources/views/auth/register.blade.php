<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container mt-5">

    <form action="/admin/user" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email"  class="form-control" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="first-name">first-name</label>
            <input type="text" class="form-control" name="first_name" placeholder="first-name">
        </div>
        <div class="form-group">
            <label for="last-name">last-name</label>
            <input type="text" class="form-control" name="last_name" placeholder="last-name">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="password" id="pass" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password-confirmation">password-confirmation</label>
            <input type="password" class="form-control" name="password-confirmation" id="password-confirmation" placeholder="password-confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>