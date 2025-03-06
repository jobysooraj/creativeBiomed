<?php
namespace App\Repositories;


use App\Models\Setting;

class SettingsRepository implements SettingsRepositoryInterface
{
    public function all()
    {
        return Setting::all();
    }

    public function find($id)
    {
        return Setting::find($id);
    }

    public function create(array $data)
    {
        try {
        return Setting::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        try {
        $setting = setting::find($id);
        if ($setting) {
            $setting->update($data);
            return $setting;
        }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return null;
    }

    public function delete($id)
    {
        return Setting::destroy($id);
    }
}