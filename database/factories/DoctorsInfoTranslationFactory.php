<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorsInfoTranslation>
 */
class DoctorsInfoTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];

    }
    public function englishName()
    {
        return $this->state(function (array $attributes) {
            return [
                'languages' => 1,
                'address' => 'Syria' ,
                'details' => 'Dr Elsayed completed his undergraduate medical studies in Egypt prior to undertaking ENT specialist training in the UK and has been a Consultant ENT (Head and Neck) surgeon since 2020.
He has also gained expertise in thyroid and parathyroid surgery working in multidisciplinary teams alongside Oncologists, Endocrinologists, Radiologists and Pathologists. As an ENT and Head and Neck consultant he is competent in both elective and emergency operations and management of common ENT conditions.
He is actively involved in research with a number of peer-reviewed publications and presentations in national conferences, and enjoys teaching junior colleagues and preparing them for their membership exams.',
                'locale' => 'en',
                'doctors_info_id' => 1 ,
            ];
        });
    }

    public function arabicName()
    {
        return $this->state(function (array $attributes) {
            return [
                'languages' => 1,
                'address' => 'سوريا' ,
                'details' => 'أكمل الدكتور السيد دراساته الطبية الجامعية في مصر قبل حصوله على تدريب متخصص في الأنف والأذن والحنجرة في المملكة المتحدة ، وكان استشاريًا في جراحة الأنف والأذن والحنجرة (الرأس والرقبة) منذ عام 2020. وقد اكتسب أيضًا خبرة في جراحة الغدة الدرقية والغدة الدرقية من خلال فرق متعددة التخصصات جنبًا إلى جنب مع أطباء الأورام وأخصائيي الغدد الصماء وأخصائيي الأشعة وأخصائيي الأمراض. بصفته استشاريًا في الأنف والأذن والحنجرة والرأس والعنق ، فهو مؤهل في كل من العمليات الاختيارية والطارئة وإدارة حالات الأنف والأذن والحنجرة الشائعة. يشارك بنشاط في البحث مع عدد من المنشورات والعروض التقديمية التي راجعها الأقران في المؤتمرات الوطنية ، ويستمتع بتدريس زملائه الصغار وإعدادهم لامتحانات العضوية.',
                'locale' => 'ar',
                'doctors_info_id' => 1 ,
            ];
        });
    }

    public function frenshName()
    {
        return $this->state(function (array $attributes) {
            return [
                'languages' => 1,
                'address' => 'Syria',
                'details' => 'terminé ses études de médecine de premier cycle en Égypte avant de suivre une formation de spécialiste en ORL au Royaume-Uni et est consultant en ORL (tête et cou) depuis 2020. Il a également acquis une expertise en chirurgie de la thyroïde et des parathyroïdes en travaillant au sein d\'équipes multidisciplinaires aux côtés d\'oncologues, d\'endocrinologues, de radiologues et de pathologistes. En tant que consultant en ORL et tête et cou, il est compétent tant dans les opérations électives qu\'urgentes et dans la gestion des affections ORL courantes. Il est activement impliqué dans la recherche avec plusieurs publications examinées par des pairs et des présentations lors de conférences nationales, et aime enseigner à ses collègues juniors et les préparer à leurs examens de membre.',
                'locale' => 'fr',
                'doctors_info_id' => 1,
            ];
        });
    }
}
