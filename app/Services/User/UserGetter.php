<?php

namespace App\Services\User;


use Illuminate\Http\Request;
use App\Repositories\Apartment\ApartmentRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ApartmentGetter
 * @package App\Services\Apartment
 */
class UserGetter
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ApartmentGetter constructor.
     * @param ApartmentRepository $apartmentRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get paginated apartment list
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(): LengthAwarePaginator
    {
        return $this->userRepository->getWithPagination();
    }

    /**
     * Get a single apartment
     * @param $id
     * @return Object|null
     */
    public function show($id)
    {
        $userData = $this->userRepository->findById($id);
        // $subjects = $this->subjectRepository->getAll()->where('created_by', $id);
        // $subjectData = [];
        // foreach ($subjects as $subject) {
        //     $students = $this->studentRepository->getAll()->where('subject_id', $subject->id);
        //     $subjectData[] = [
        //         'subject' => $subject,
        //         'student_count' => $students->count(),
        //     ];
        // }
        // $subjectCount = count($subjectData);
        // $user = Auth::user()->id;

        // $responseData = [
        //     'user_data' => $userData,
        //     'subject_data' => $subjectData,
        //     'subject_count' => $subjectCount,
        //     'user' => $user
        // ];

        return $userData;
    }
}
