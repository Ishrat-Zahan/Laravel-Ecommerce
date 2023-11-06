<?php

namespace App\Http\Controllers;

use App\Models\ShortBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShortBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sbanner = Shortbanner::all();
        return view('admin.shortbanner.index', compact('sbanner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $colors = [

            "#000000" => "Black",
            "#FF0000" => "Red",
            "#0000FF" => "Blue",
            "#FFFF00" => "Yellow",
            "#FFC0CB" => "Pink",
            "#008000" => "Green",
            "#008080" => "Teal",
            "#240A40" => "Violet",
            "#800000" => "Maroon",
            "#800080" => "Purple",
            "#808000" => "Olive",
            "#808080" => "Gray",
            "#FFFFFF" => "White",
            "#4F69C6" => "Indigo",
            "#76D7EA" => "Sky Blue",
            "#FFF1D8" => "Pink Lady",
            "#FF9900" => "Orange",
            "#00FFFF" => "Cyan",
            "#FFF0DB" => "Peach Cream",
            "#FFF0F5" => "Lavender blush",
            "#FFF14F" => "Gorse",
            "#FFF1B5" => "Buttermilk",
            'aliceblue' => 'F0F8FF',
            'antiquewhite' => 'FAEBD7',
            'aqua' => '00FFFF',
            'aquamarine' => '7FFFD4',
            'azure' => 'F0FFFF',
            'beige' => 'F5F5DC',
            'bisque' => 'FFE4C4',
            'black' => '000000',
            'blanchedalmond' => 'FFEBCD',
            'blue' => '0000FF',
            'blueviolet' => '8A2BE2',
            'brown' => 'A52A2A',
            'burlywood' => 'DEB887',
            'cadetblue' => '5F9EA0',
            'chartreuse' => '7FFF00',
            'chocolate' => 'D2691E',
            'coral' => 'FF7F50',
            'cornflowerblue' => '6495ED',
            'cornsilk' => 'FFF8DC',
            'crimson' => 'DC143C',
            'cyan' => '00FFFF',
            'darkblue' => '00008B',
            'darkcyan' => '008B8B',
            'darkgoldenrod' => 'B8860B',
            'darkgray' => 'A9A9A9',
            'darkgreen' => '006400',
            'darkgrey' => 'A9A9A9',
            'darkkhaki' => 'BDB76B',
            'darkmagenta' => '8B008B',
            'darkolivegreen' => '556B2F',
            'darkorange' => 'FF8C00',
            'darkorchid' => '9932CC',
            'darkred' => '8B0000',
            'darksalmon' => 'E9967A',
            'darkseagreen' => '8FBC8F',
            'darkslateblue' => '483D8B',
            'darkslategray' => '2F4F4F',
            'darkslategrey' => '2F4F4F',
            'darkturquoise' => '00CED1',
            'darkviolet' => '9400D3',
            'deeppink' => 'FF1493',
            'deepskyblue' => '00BFFF',
            'dimgray' => '696969',
            'dimgrey' => '696969',
            'dodgerblue' => '1E90FF',
            'firebrick' => 'B22222',
            'floralwhite' => 'FFFAF0',
            'forestgreen' => '228B22',
            'fuchsia' => 'FF00FF',
            'gainsboro' => 'DCDCDC',
            'lavender' => 'E6E6FA',
            'lavenderblush' => 'FFF0F5',
            'lawngreen' => '7CFC00',
            'lemonchiffon' => 'FFFACD',
            'lightblue' => 'ADD8E6',
            'lightcoral' => 'F08080',
            'lightcyan' => 'E0FFFF',
            'lightgoldenrodyellow' => 'FAFAD2',
            'lightgray' => 'D3D3D3',
            'lightgreen' => '90EE90',
            'lightgrey' => 'D3D3D3',
            'lightpink' => 'FFB6C1',
            'lightsalmon' => 'FFA07A',
            'lightseagreen' => '20B2AA',
            'lightskyblue' => '87CEFA',
            'lightslategray' => '778899',
            'lightslategrey' => '778899',
            'lightsteelblue' => 'B0C4DE',
            'lightyellow' => 'FFFFE0',
            'lime' => '00FF00',
            "#9DE5FF" => "Anakiwa",
            "#9E5302" => "Chelsea Gem",
            "#9E5B40" => "Sepia Skin",
            "#9EA587" => "Sage",
            "#9EA91F" => "Citron",
            "#9EB1CD" => "Rock Blue",
            "#9EDEE0" => "Morning Glory",
            "#9F381D" => "Cognac",
            "#9F821C" => "Reef Gold",
            "#9F9F9C" => "Star Dust",
            "#9FA0B1" => "Santas Gray",
            "#9FD7D3" => "Sinbad",
            "#9FDD8C" => "Feijoa",
            "#A02712" => "Tabasco",
            "#A1750D" => "Buttered Rum",
            "#A1ADB5" => "Hit Gray",
            "#A1C50A" => "Citrus",
            "#A1DAD7" => "Aqua Island",
            "#A1E9DE" => "Water Leaf",
            "#A2006D" => "Flirt",
            "#A23B6C" => "Rouge",
            "#A26645" => "Cape Palliser",
            "#A2AAB3" => "Gray Chateau",
            "#A2AEAB" => "Edward",
            "#A3807B" => "Pharlap",
            "#A397B4" => "Amethyst Smoke",
            "#A3E3ED" => "Blizzard Blue",
            "#A4A49D" => "Delta",
            "#A4A6D3" => "Wistful",
            "#A8BD9F" => "Norway",
            "#A8E3BD" => "Chinook",
            "#A9A491" => "Gray Olive",
            "#A9ACB6" => "Aluminium",
            "#A9B2C3" => "Cadet Blue",
            "#A9B497" => "Schist",
            "#A9BDBF" => "Tower Gray",
            "#A9BEF2" => "Perano",
            "#A9C6C2" => "Opal",
            "#AA375A" => "Night Shadz",
            "#AA4203" => "Fire",
            "#AA8B5B" => "Muesli",
            "#AA8D6F" => "Sandal",
            "#AAA5A9" => "Shady Lady",
            "#AAA9CD" => "Logan",
            "#AAABB7" => "Spun Pearl",
            "#AAD6E6" => "Regent St Blue",




        ];

        return view('admin.shortbanner.create', ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'url' => $request->url,
            'banner_type' => $request->banner_type,
            'banner_title' => $request->banner_title,
            'status' => $request->status,
            'discount' => $request->discount,
            'btn_text' => $request->btn_text,
            'bg_color' => $request->bg_color,

        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads');
            $data['image'] = $path;
        }

        $banner = Shortbanner::create($data);

        return redirect()->route("shortbanner.index")->with("success", "Banner saved successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Shortbanner $shortbanner)
    {
        return view('admin.shortbanner.show', compact('shortbanner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shortbanner $shortbanner)
    {
        $colors = [

            "#000000" => "Black",
            "#FF0000" => "Red",
            "#0000FF" => "Blue",
            "#FFFF00" => "Yellow",
            "#FFC0CB" => "Pink",
            "#008000" => "Green",
            "#008080" => "Teal",
            "#240A40" => "Violet",
            "#800000" => "Maroon",
            "#800080" => "Purple",
            "#808000" => "Olive",
            "#808080" => "Gray",
            "#FFFFFF" => "White",
            "#4F69C6" => "Indigo",
            "#76D7EA" => "Sky Blue",
            "#FFF1D8" => "Pink Lady",
            "#FF9900" => "Orange",
            "#00FFFF" => "Cyan",
            "#FFF0DB" => "Peach Cream",
            "#FFF0F5" => "Lavender blush",
            "#FFF14F" => "Gorse",
            "#FFF1B5" => "Buttermilk",
            'aliceblue' => 'F0F8FF',
            'antiquewhite' => 'FAEBD7',
            'aqua' => '00FFFF',
            'aquamarine' => '7FFFD4',
            'azure' => 'F0FFFF',
            'beige' => 'F5F5DC',
            'bisque' => 'FFE4C4',
            'black' => '000000',
            'blanchedalmond' => 'FFEBCD',
            'blue' => '0000FF',
            'blueviolet' => '8A2BE2',
            'brown' => 'A52A2A',
            'burlywood' => 'DEB887',
            'cadetblue' => '5F9EA0',
            'chartreuse' => '7FFF00',
            'chocolate' => 'D2691E',
            'coral' => 'FF7F50',
            'cornflowerblue' => '6495ED',
            'cornsilk' => 'FFF8DC',
            'crimson' => 'DC143C',
            'cyan' => '00FFFF',
            'darkblue' => '00008B',
            'darkcyan' => '008B8B',
            'darkgoldenrod' => 'B8860B',
            'darkgray' => 'A9A9A9',
            'darkgreen' => '006400',
            'darkgrey' => 'A9A9A9',
            'darkkhaki' => 'BDB76B',
            'darkmagenta' => '8B008B',
            'darkolivegreen' => '556B2F',
            'darkorange' => 'FF8C00',
            'darkorchid' => '9932CC',
            'darkred' => '8B0000',
            'darksalmon' => 'E9967A',
            'darkseagreen' => '8FBC8F',
            'darkslateblue' => '483D8B',
            'darkslategray' => '2F4F4F',
            'darkslategrey' => '2F4F4F',
            'darkturquoise' => '00CED1',
            'darkviolet' => '9400D3',
            'deeppink' => 'FF1493',
            'deepskyblue' => '00BFFF',
            'dimgray' => '696969',
            'dimgrey' => '696969',
            'dodgerblue' => '1E90FF',
            'firebrick' => 'B22222',
            'floralwhite' => 'FFFAF0',
            'forestgreen' => '228B22',
            'fuchsia' => 'FF00FF',
            'gainsboro' => 'DCDCDC',
            'lavender' => 'E6E6FA',
            'lavenderblush' => 'FFF0F5',
            'lawngreen' => '7CFC00',
            'lemonchiffon' => 'FFFACD',
            'lightblue' => 'ADD8E6',
            'lightcoral' => 'F08080',
            'lightcyan' => 'E0FFFF',
            'lightgoldenrodyellow' => 'FAFAD2',
            'lightgray' => 'D3D3D3',
            'lightgreen' => '90EE90',
            'lightgrey' => 'D3D3D3',
            'lightpink' => 'FFB6C1',
            'lightsalmon' => 'FFA07A',
            'lightseagreen' => '20B2AA',
            'lightskyblue' => '87CEFA',
            'lightslategray' => '778899',
            'lightslategrey' => '778899',
            'lightsteelblue' => 'B0C4DE',
            'lightyellow' => 'FFFFE0',
            'lime' => '00FF00',


        ];

        return view('admin.shortbanner.edit', ['colors' => $colors, 'shortbanner' => $shortbanner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shortbanner $shortbanner)
    {
        $shortbanner->fill($request->all());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads');


            if ($shortbanner->image && Storage::exists($shortbanner->image)) {
                Storage::delete($shortbanner->image);
            }

            $shortbanner->image = $path;
        }

        $shortbanner->save();

        return redirect()->route("shortbanner.index")->with("success", "banner updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shortbanner $shortbanner)
    {
        if (Shortbanner::destroy($shortbanner->id)) {
            return redirect("shortbanner")->with("success", "Successfully Deleted");
        }
    }
}
