<?php

class DetailsController extends BaseController {

	/**
	 * Detail Repository
	 *
	 * @var Detail
	 */
	protected $detail;

	public function __construct(Detail $detail)
	{
		$this->detail = $detail;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$details = $this->detail->all();

		return View::make('details.index', compact('details'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('details.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Detail::$rules);

		if ($validation->passes())
		{
			$this->detail->create($input);

			return Redirect::route('details.index');
		}

		return Redirect::route('details.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$detail = $this->detail->findOrFail($id);

		return View::make('details.show', compact('detail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$detail = $this->detail->find($id);

		if (is_null($detail))
		{
			return Redirect::route('details.index');
		}

		return View::make('details.edit', compact('detail'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Detail::$rules);

		if ($validation->passes())
		{
			$detail = $this->detail->find($id);
			$detail->update($input);

			return Redirect::route('details.show', $id);
		}

		return Redirect::route('details.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->detail->find($id)->delete();

		return Redirect::route('details.index');
	}

}
