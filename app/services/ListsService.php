<?php

namespace App\services;

use App\enums\ActiveInactiveStatus;
use App\enums\ErrorCode;
use App\enums\RequestStatus;
use App\Models\API\lists\ContactMediaResult;
use App\Models\API\lists\JobTypeResult;
use App\Models\Job;
use App\Models\MediaContact;
use App\Models\API\other\ApiMessage;
use App\Models\API\other\IdValueApiModel;
use App\Models\City;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;


class ListsService {

    public static function ContactMediasList($request)
    {

        try {
            $page_size = $request->pagesize ? $request->pagesize : 10;
            $query = DB::table('preferred_contact_media')->latest();

            if ($request->search) {
                $query = $query
                    ->where('name', 'LIKE', "%{$request->search}%");
            }

            $data = [];
            foreach ($query->paginate($page_size) as $one) {
                $item = FillApiModelService::FillContactMediaApiModel($one);
                $data[] = $item;
            }


            $res = new ContactMediaResult([
                'items_count' => MediaContact::all()->count(),
                'result' => $data,
                'isOk' => true,
                'message' => new ApiMessage([
                    'type' => 'Success',
                    'code' => ErrorCode::success,
                    'content' => '',
                ]),
            ]);

            return [true, $res, '', ''];
        } catch (\Exception $ex) {
            return [false, null, AdminService::Msg_Exception, $ex->getMessage()];
        }
    }

    public static function SectionsList($request) {

        try {
            $page_size = $request->pagesize ? $request->pagesize : 10;
            $query = DB::table('sections')
                ->where('status', ActiveInactiveStatus::active)->latest();

            if ($request->search) {
                $query = $query
                    ->where('name', 'LIKE', "%{$request->search}%");
            }
            $data = [];
            foreach ($query->paginate($page_size) as $one) {
                $item = FillApiModelService::FillListSectionApiModel($one);
                $data[] = $item;
            }


            $res = new JobTypeResult([
                'items_count'=>Section::count(),
                'result' => $data,
                'isOk' => true,
                'message' => new ApiMessage([
                    'type' => 'Success',
                    'code' => ErrorCode::success,
                    'content' => '',
                ]),
            ]);

            return [true , $res , '' , ''];
        } catch (\Exception $ex){
            return [false , null , AdminService::Msg_Exception , $ex->getMessage()];
        }


    }

    public static function JobsList($request) {

        try {
            $page_size = $request->pagesize ? $request->pagesize : 10;
            $query = DB::table('jobs')
                ->where('status', ActiveInactiveStatus::active)->latest();

            if ($request->search) {
                $query = $query
                    ->where('name', 'LIKE', "%{$request->search}%");
            }
            $data = [];
            foreach ($query->paginate($page_size) as $one) {
                $item = FillApiModelService::FillListJobTypeApiModel($one);
                $data[] = $item;
            }


            $res = new JobTypeResult([
                'items_count'=>Job::count(),
                'result' => $data,
                'isOk' => true,
                'message' => new ApiMessage([
                    'type' => 'Success',
                    'code' => ErrorCode::success,
                    'content' => '',
                ]),
            ]);

            return [true , $res , '' , ''];
        } catch (\Exception $ex){
            return [false , null , AdminService::Msg_Exception , $ex->getMessage()];
        }


    }



}
