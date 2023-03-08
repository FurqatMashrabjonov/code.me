<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Process;

class LogController extends Controller
{
    public array $output = [];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->create();
        $process = new Process(['node', public_path('test1/code.js')]);
        $process->setTimeout(5);
        $process->start();

        try {
            $process->wait(function ($type, $buffer) {
                if (Process::ERR === $type) {
                    echo 'Error: ' . $buffer;
                } else {
                    $this->output[] = $buffer;
                }
            });
        } catch (ProcessTimedOutException $e) {
            $process->stop(0);
        }

        dd($this->output);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filename = public_path("test1/output.txt");
        $filehandle = fopen($filename, "w+");
        if ($filehandle) {
            fclose($filehandle);
            chmod($filename, 0666); // Set read and write permissions
            echo "File created successfully with read and write permissions.";
        } else {
            echo "Error creating file.";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        //
    }
}
