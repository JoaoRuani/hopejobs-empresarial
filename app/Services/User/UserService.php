<?php 

namespace App\Services\User;

use App\Brokers\Repositories\User\UserRepositoryContract;
use App\Models\User;
use App\Services\Company\CompanyServiceContract;
use App\Services\User\UserServiceContract;
use InvalidArgumentException;

class UserService implements UserServiceContract
{
    private CompanyServiceContract $companyService;
    private UserRepositoryContract $userRepository;
    public function __construct(CompanyServiceContract $companyService, UserRepositoryContract $userRepository)
    {
        $this->companyService = $companyService;
        $this->userRepository = $userRepository;
    }
    public function create(User $user, string $cnpj) : User
    {
        if ($user == null) { throw new InvalidArgumentException('Argumento user não pode ser nulo.');}
        try {
            $company = $this->companyService->createByCnpj($cnpj);
            return $this->userRepository->create($user, $company);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
