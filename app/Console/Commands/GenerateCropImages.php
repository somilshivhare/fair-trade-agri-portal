<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateCropImages extends Command
{
    protected $signature = 'app:generate-crop-images';
    protected $description = 'Generate local crop placeholder images using GD';

    public function handle()
    {
        $crops = [
            'grains' => ['wheat', 'rice', 'maize', 'barley', 'jowar', 'bajra', 'ragi'],
            'vegetables' => ['tomato', 'potato', 'onion', 'cabbage', 'cauliflower', 'brinjal', 'okra', 'carrot', 'spinach', 'peas'],
            'fruits' => ['mango', 'banana', 'apple', 'orange', 'grapes', 'papaya', 'guava', 'pomegranate'],
            'pulses' => ['arhar', 'moong', 'urad', 'chana', 'masoor']
        ];

        $dir = public_path('images/crops');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        $width = 600;
        $height = 400;

        foreach ($crops as $category => $items) {
            foreach ($items as $crop) {
                $image = imagecreatetruecolor($width, $height);

                // Set gradient colors depending on category
                switch ($category) {
                    case 'grains': // Golden/Yellow
                        $color1 = [217, 119, 6];   // #d97706
                        $color2 = [251, 191, 36];  // #fbbf24
                        break;
                    case 'vegetables': // Emerald Green
                        $color1 = [4, 120, 87];    // #047857
                        $color2 = [52, 211, 153];  // #34d399
                        break;
                    case 'fruits': // Sunset Orange/Red
                        $color1 = [220, 38, 38];   // #dc2626
                        $color2 = [249, 115, 22];  // #f97316
                        break;
                    case 'pulses': // Warm Earthy Brown
                        $color1 = [120, 53, 15];   // #78350f
                        $color2 = [180, 83, 9];    // #b45309
                        break;
                    default:
                        $color1 = [75, 85, 99];
                        $color2 = [156, 163, 175];
                }

                // Draw linear gradient
                for ($y = 0; $y < $height; $y++) {
                    $r = (int)($color1[0] + ($color2[0] - $color1[0]) * ($y / $height));
                    $g = (int)($color1[1] + ($color2[1] - $color1[1]) * ($y / $height));
                    $b = (int)($color1[2] + ($color2[2] - $color1[2]) * ($y / $height));
                    $color = imagecolorallocate($image, $r, $g, $b);
                    imageline($image, 0, $y, $width, $y, $color);
                }

                // Add nice geometric grid overlay pattern (opacity simulated by drawing thin lines)
                $gridColor = imagecolorallocate($image, 255, 255, 255);
                for ($x = 0; $x < $width; $x += 40) {
                    // vertical dashed lines
                    for ($y = 0; $y < $height; $y += 10) {
                        if (($x + $y) % 20 === 0) {
                            imagesetpixel($image, $x, $y, $gridColor);
                        }
                    }
                }
                for ($y = 0; $y < $height; $y += 40) {
                    // horizontal dashed lines
                    for ($x = 0; $x < $width; $x += 10) {
                        if (($x + $y) % 20 === 0) {
                            imagesetpixel($image, $x, $y, $gridColor);
                        }
                    }
                }

                // Draw category tag label (small box in top-left)
                $tagBg = imagecolorallocate($image, 255, 255, 255);
                $tagText = imagecolorallocate($image, $color1[0], $color1[1], $color1[2]);
                imagefilledrectangle($image, 30, 30, 160, 60, $tagBg);
                
                // Write category text (using GD default font 4)
                imagestring($image, 4, 45, 37, strtoupper($category), $tagText);

                // Draw Crop Name in large bold text (centered)
                $textColor = imagecolorallocate($image, 255, 255, 255);
                $cropName = ucfirst($crop);
                
                // Draw crop name with GD internal font (using size 5 - largest internal font)
                // Center text manually
                $fontWidth = imagefontwidth(5);
                $textWidth = strlen($cropName) * $fontWidth;
                $startX = (int)(($width - $textWidth) / 2);
                $startY = (int)(($height - imagefontheight(5)) / 2);
                
                // Draw shadow first
                $shadowColor = imagecolorallocate($image, 0, 0, 0);
                imagestring($image, 5, $startX + 2, $startY + 2, $cropName, $shadowColor);
                imagestring($image, 5, $startX, $startY, $cropName, $textColor);

                // Draw crop icon symbol representation (e.g. circles or leaves representation)
                $circleColor = imagecolorallocate($image, 255, 255, 255);
                imagearc($image, (int)($width / 2), (int)($height / 2) + 60, 40, 40, 0, 360, $circleColor);
                imagearc($image, (int)($width / 2) - 20, (int)($height / 2) + 60, 20, 20, 0, 360, $circleColor);
                imagearc($image, (int)($width / 2) + 20, (int)($height / 2) + 60, 20, 20, 0, 360, $circleColor);

                // Save image
                $filename = $dir . '/' . $crop . '.jpg';
                imagejpeg($image, $filename, 90);
                imagedestroy($image);
            }
        }

        $this->info('Crop placeholder images generated successfully in public/images/crops/');
    }
}
