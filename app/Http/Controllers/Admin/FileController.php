<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Input;

class FileController extends AdminController
{
    /** @var  FileRepository */
    private $fileRepository;


	/**
	 * @param FileRepository $fileRepository
	 */
    public function __construct(FileRepository $fileRepository)
    {
		parent::__construct();
        $this->fileRepository = $fileRepository;
    }

    /**
     * Display a listing of the File.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fileRepository->pushCriteria(new RequestCriteria($request));
        $files = $this->fileRepository->all();

        return view('admin.files.index')
            ->with('files', $files);
    }

    /**
     * Show the form for creating a new File.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created File in storage.
     *
     * @param CreateFileRequest $request
     *
     * @return Response
     */
    public function store(CreateFileRequest $request)
    {
		if (Input::hasFile('file') && Input::file('file') !== NULL) {
			$uploadFile = Input::file('file');
			$fileData = [
				'original_name' => $uploadFile->getClientOriginalName()
			];
			$filename = File::getPrefixFile() . '-' . str_replace(' ', '', $fileData['original_name']);
			$fileData['filename'] = File::getFileBasePath() . '/' . $filename;

			$file = $this->fileRepository->create($fileData);
			if (! empty($file)) {
				$uploadFile->move(File::getFileBasePath(), $fileData['filename']);
			}
			Flash::success('File saved successfully.');
		}
        return redirect(route('admin.files.index'));
    }

    /**
     * Display the specified File.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $file = $this->fileRepository->findWithoutFail($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        return view('admin.files.show')->with('file', $file);
    }

    /**
     * Show the form for editing the specified File.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $file = $this->fileRepository->findWithoutFail($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        return view('admin.files.edit')->with('file', $file);
    }

    /**
     * Update the specified File in storage.
     *
     * @param  int              $id
     * @param UpdateFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileRequest $request)
    {
        $file = $this->fileRepository->findWithoutFail($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        $file = $this->fileRepository->update($request->all(), $id);

        Flash::success('File updated successfully.');

        return redirect(route('admin.files.index'));
    }

    /**
     * Remove the specified File from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $file = $this->fileRepository->findWithoutFail($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        $this->fileRepository->delete($id);

        Flash::success('File deleted successfully.');

        return redirect(route('admin.files.index'));
    }

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function getMediaAjax(Request $request) {
		$medias = [];
		$mediaPath = public_path() . '/uploads';


		foreach (glob($mediaPath . "/*.*") as $filename) {
			$medias[] = str_replace(dirname($filename), asset('/uploads'), $filename);
		}

		if($request->ajax()){
			return response()->json([
				'status' => 200,
				'medias' => $medias
			]);
		}
	}
}
