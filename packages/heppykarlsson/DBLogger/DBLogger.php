<?php namespace HeppyKarlsson\DBLogger;

use HeppyKarlsson\DBLogger\Exception\Exception;
use HeppyKarlsson\DBLogger\Model\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DBLogger {

    public function save(\Throwable $exception) {

        $request = request();
        $log = new Log();

        try {
            $log->error = $exception->getMessage();
            $log->route = Route::currentRouteName();
            $log->url = $request->path();
            $log->method = $request->method();
            $log->user_id = Auth::id();
            $log->referer = $request->header('referer');
            $log->file = $exception->getFile();
            $log->row = $exception->getLine();
            $log->severity = method_exists($exception, 'getSeverity') ? $exception->getSeverity() : null;
            $log->code = $exception->getCode();
            $log->exception = get_class($exception);

            $trace = $exception->getTrace();
            $log->trace = json_encode($trace);

            $log->save();
        }
        catch(\Exception $e) {
            throw new Exception('Database error: ' . $e->getMessage());
            return false;
        }

        return true;
    }

}