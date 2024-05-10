<?php

namespace App\Http\Controllers;

use App\Models\Bpase;
use App\Models\Ush;
use App\Models\Water;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller{
    public function showQuiz()
    {
        $pilihan = [
            ['id' => 'customRadio1', 'value' => 'almost_never', 'label' => 'Almost never'],
            ['id' => 'customRadio2', 'value' => 'occasionally', 'label' => 'Occasionally'],
            ['id' => 'customRadio3', 'value' => 'sometimes', 'label' => 'Sometimes'],
            ['id' => 'customRadio4', 'value' => 'often', 'label' => 'Often'],
            ['id' => 'customRadio5', 'value' => 'always', 'label' => 'Always']
        ];

        $questions = [
            [
                'text' => 'How often do you find it difficult to sleep because your mind keeps racing?',
                'name' => 'difficult_to_sleep',
                'options' => $pilihan
            ],
            [
                'text' => 'How often do you feel anxious or worried without any clear reason?',
                'name' => 'anxious_or_worried',
                'options' => $pilihan
            ],
            [
                'text' => "How often do you feel tired or exhausted even though you haven't done any strenuos physical activity?",
                'name' => 'tired_or_exhausted',
                'options' => $pilihan
            ],
            [
                'text' => 'How often do you feel confused or lost in navigating life?',
                'name' => 'confused_or_lost',
                'options' => $pilihan
            ],
            [
                'text' => 'How often do you find it difficult to enjoy activities that you usually find pleasurable?',
                'name' => 'find_difficult',
                'options' => $pilihan
            ]

        ];

        return view('Componen.StressMeter', compact('questions'));
    }

    public function submitQuiz(Request $request)
    {
        // Validasi input dari form quiz jika diperlukan
        $validatedData = $request->validate([
            // Tentukan aturan validasi sesuai dengan kebutuhan
        ]);

        try {
            // Simpan hasil quiz ke dalam database atau lakukan operasi lainnya sesuai kebutuhan
            // Di sini Anda bisa mengakses dan menyimpan jawaban yang di-submit oleh pengguna
            // Contoh:
            $difficultToSleep = $request->input('difficult_to_sleep');
            $anxiousOrWorried = $request->input('anxious_or_worried');
            $tiredOrExhausted = $request->input('tired_or_exhausted');
            $confusedOrLost = $request->input('confused_or_lost');
            $findDifficult = $request->input('confused_or_lost');
            // Lakukan hal yang sama untuk setiap pertanyaan lainnya

            // Setelah mendapatkan jawaban, Anda bisa menyimpannya ke dalam database atau melakukan operasi lainnya
            // Misalnya, simpan ke dalam tabel 'StressMeterResults'

            return redirect()->back()->with('success', 'Quiz submitted successfully.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan dan kembalikan ke halaman sebelumnya
            return redirect()->back()->with('error', 'Failed to submit quiz. Please try again.');
        }
    }
}
