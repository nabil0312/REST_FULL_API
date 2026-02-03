    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ScoreController;

    Route::get('/', function () {
        return view('index');
    });

    Route::resource('/score', ScoreController::class);