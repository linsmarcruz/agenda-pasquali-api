<?php

namespace App\Http\Controllers\Abstracts;

use App\Exceptions\InvalidParamsException;
use App\Http\Controllers\Controller;
use App\Services\Abstracts\AbstractCrudService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

abstract class AbstractCrudController extends Controller
{

    public function __construct(
        protected AbstractCrudService $service,
        protected FormRequest $request
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $data = $this->service->save($this->request);

        return response()->json($data, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $params = self::setParams(['uuid' => $uuid], ['uuid' => 'required|uuid']);
        self::validateParams($params);

        $data = $this->service->getById($uuid);

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $uuid)
    {
        $params = self::setParams(['uuid' => $uuid], ['uuid' => 'required']);
        self::validateParams($params);

        $data = $this->service->update($this->request, $uuid);

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $params = self::setParams(['uuid' => $uuid], ['uuid' => 'required']);
        self::validateParams($params);

        $this->service->delete($uuid);

        return response()->json(['message' => "Register $uuid deleted succesfuly."], Response::HTTP_NO_CONTENT);
    }

    /**
     * Set the input parameters for validation.
     *
     * @param array $values The values to be validated.
     * @param array $rules The validation rules to be applied.
     *
     * @return array The configured parameters array.
     */
    protected static function setParams(array $values, array $rules): array
    {
        return   [
            'values' => $values,
            'rules' =>  $rules
        ];
    }

    /**
     * Validate input parameters based on the provided rules.
     *
     * @param array $params An array with 'values' (values to be validated) and 'rules' (validation rules).
     *
     * @throws InvalidParamsException If validation of the parameters fails.
     */
    protected static function validateParams(array $params): void
    {
        $validator = Validator::make($params['values'], $params['rules']);

        if ($validator->fails() === true) {
            throw new InvalidParamsException($validator->errors());
        }
    }
}
