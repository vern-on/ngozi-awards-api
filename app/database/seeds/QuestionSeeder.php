<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\QuestionCategory as Category;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'title' => 'How do I contact you?',
            'slug' => \Str::slug('How do I contact you'),
            'content' => 'We would be delighted to hear from you! Please do not hesitate to drop us a message and we will be in touch as soon as possible.',
        ]);

        Question::create([
            'title' => 'How much does it cost to enter the Ngozi Awards competition?',
            'slug' => \Str::slug('How much does it cost to enter the Ngozi Awards competition'),
            'content' => 'Ngozi Awards are FREE to enter.',
        ]);

        $question = Question::create([
            'title' => 'Is judging anonymous?',
            'slug' => \Str::slug('Is judging anonymous'),
            'content' => 'Yes, we respect the integrity of the photographers and therefore judging is anonymous.  Judges will not know the names of any of the entrants'
        ]);

        $question->categories()->attach(Category::where('slug', 'adjudication')->first()->id);


        $question = Question::create([
            'title' => 'When and where are the 2021 Ngozi Awards?',
            'slug' => \Str::slug('When and where are the 2021 Ngozi Awards'),
            'content' => 'The Awards Ceremony will be held in Nairobi, Kenya in August of 2021',
        ]);

        $question->categories()->attach(Category::where('slug', 'scheduling')->first()->id);

        $question = Question::create([
            'title' => 'Is there a limit to the number of entries I can submit?',
            'slug' => \Str::slug('Is there a limit to the number of entries I can submit'),
            'content' => 'No, you may submit as many entries, in as many categories, as you wish.'
        ]);

        $question->categories()->attach(Category::where('slug', 'winners')->first()->id);
        $question->categories()->attach(Category::where('slug', 'adjudication')->first()->id);
        $question->categories()->attach(Category::where('slug', 'media')->first()->id);

        $question = Question::create([
            'title' => 'Is there a time limit within which the photographs should have been taken?',
            'slug' => \Str::slug('Is there a time limit within which the photographs should have been taken'),
            'content' => 'Yes. All photographs should be no more than 1 year old.'
        ]);

        $question->categories()->attach(Category::where('slug', 'media')->first()->id);
        $question->categories()->attach(Category::where('slug', 'adjudication')->first()->id);

        $question = Question::create([
            'title' => 'How will my images be used?',
            'slug' => \Str::slug('How will my images be used'),
            'content' => 'You will be contacted each time we identify an image for usage – and briefed on what the usage will be. Your images are NEVER used for any purpose other than the promotion of Ngozi Awards.',
        ]);

        $question->categories()->attach(Category::where('slug', 'media')->first()->id);
        $question->categories()->attach(Category::where('slug', 'data-protection')->first()->id);
        $question->categories()->attach(Category::where('slug', 'winners')->first()->id);

        $question = Question::create([
            'title' => 'What are the Award Categories?',
            'slug' => \Str::slug('What are the Award Categories'),
            'content' => 'Amateur Photography, Wildlife Photography, Landscape Photography, Humanitarian Photography, Portraiture, Sports Photography, Creative Photography, Website/Blog Photography and Event Photography.'
        ]);

        $question->categories()->attach(Category::where('slug', 'winners')->first()->id);
        $question->categories()->attach(Category::where('slug', 'media')->first()->id);
        $question->categories()->attach(Category::where('slug', 'adjudication')->first()->id);

        $question = Question::create([
            'title' => 'Who may enter this contest?',
            'slug' => \Str::slug('Who may enter this contest'),
            'content' => 'Entrants must be 18 years or older. Employees and direct family members of Ngozi Awards and its affiliates are not eligible to enter or win prizes.'
        ]);

        $question->categories()->attach(Category::where('slug', 'winners')->first()->id);
        $question->categories()->attach(Category::where('slug', 'adjudication')->first()->id);

        $question = Question::create([
            'title' => 'How are the entries judged?',
            'slug' => \Str::slug('How are the entries judged'),
            'content' => 'The judges evaluate the effectiveness of both the art and the craft in determining a score.'
        ]);

        $question->categories()->attach(Category::where('slug', 'adjudication')->first()->id);
        $question->categories()->attach(Category::where('slug', 'winners')->first()->id);

        $question = Question::create([
            'title' => 'When will the winners be announced?',
            'slug' => \Str::slug('When will the winners be announced'),
            'content' => 'Winners will be announced during the Awards Ceremony in August 2021 and the winning entries will be published on ngoziawards.org',
        ]);

        $question->categories()->attach(Category::where('slug', 'winners')->first()->id);
        $question->categories()->attach(Category::where('slug', 'scheduling')->first()->id);

        $question = Question::create([
            'title' => 'Should I watermark my images?',
            'slug' => \Str::slug('Should I watermark my images'),
            'content' => 'No, we will appropriately credit all winning photographers.'
        ]);

        $question->categories()->attach(Category::where('slug', 'media')->first()->id);
    }
}
