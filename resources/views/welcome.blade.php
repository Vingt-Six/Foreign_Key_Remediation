<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <section class="container">
        <h2>Create classe</h2>
        <form action="classe" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="First name" aria-label="Classe"
                        name="classe">
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Create</button>
        </form>
    </section>
    <section class="container mt-5">
        <h2>Create Student</h2>
        <form action="/student" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="18" aria-label="Age" name="age">
                </div>
            </div>
            <select class="form-select" aria-label="Default select example" name="classe_id">
                <option selected>Open this select menu</option>
                @foreach ($classes as $classe)
                    <option value="{{ $classe->id }}">{{ $classe->classe }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-warning mt-3">Create Student</button>
        </form>
    </section>
    <section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Classe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->classe->classe }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Classe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $classe)
                    <tr>
                        <th scope="row">{{ $classe->id }}</th>
                        <td>{{ $classe->classe }}</td>
                        @foreach ($classe->student as $e)
                            <td>{{ $e->name }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section>
        <form action="/phone" method="POST">
            @csrf
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Brand</label>
                <input type="text" class="form-control" id="formGroupExampleInput"
                    placeholder="Example input placeholder" name="brand">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Number Serie</label>
                <input type="text" class="form-control" id="formGroupExampleInput2"
                    placeholder="Another input placeholder" name="numberSeries">
            </div>
            <button type="submit" class="btn btn-primary">Create Phone</button>
        </form>
    </section>

    <section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Number Serie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($phones as $phone)
                    <tr>
                        <th scope="row">{{ $phone->id }}</th>
                        <td>{{ $phone->brand }}</td>
                        <td>{{ $phone->serie->numberSeries }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>

</html>
