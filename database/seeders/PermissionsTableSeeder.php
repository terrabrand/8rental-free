<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 22,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 23,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 24,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 25,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 26,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 27,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 28,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 29,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 30,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 31,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 32,
                'title' => 'contact_access',
            ],
            [
                'id'    => 33,
                'title' => 'landlord_create',
            ],
            [
                'id'    => 34,
                'title' => 'landlord_edit',
            ],
            [
                'id'    => 35,
                'title' => 'landlord_show',
            ],
            [
                'id'    => 36,
                'title' => 'landlord_delete',
            ],
            [
                'id'    => 37,
                'title' => 'landlord_access',
            ],
            [
                'id'    => 38,
                'title' => 'properties_menu_access',
            ],
            [
                'id'    => 39,
                'title' => 'section_create',
            ],
            [
                'id'    => 40,
                'title' => 'section_edit',
            ],
            [
                'id'    => 41,
                'title' => 'section_show',
            ],
            [
                'id'    => 42,
                'title' => 'section_delete',
            ],
            [
                'id'    => 43,
                'title' => 'section_access',
            ],
            [
                'id'    => 44,
                'title' => 'unit_create',
            ],
            [
                'id'    => 45,
                'title' => 'unit_edit',
            ],
            [
                'id'    => 46,
                'title' => 'unit_show',
            ],
            [
                'id'    => 47,
                'title' => 'unit_delete',
            ],
            [
                'id'    => 48,
                'title' => 'unit_access',
            ],
            [
                'id'    => 49,
                'title' => 'property_create',
            ],
            [
                'id'    => 50,
                'title' => 'property_edit',
            ],
            [
                'id'    => 51,
                'title' => 'property_show',
            ],
            [
                'id'    => 52,
                'title' => 'property_delete',
            ],
            [
                'id'    => 53,
                'title' => 'property_access',
            ],
            [
                'id'    => 54,
                'title' => 'maintainer_create',
            ],
            [
                'id'    => 55,
                'title' => 'maintainer_edit',
            ],
            [
                'id'    => 56,
                'title' => 'maintainer_show',
            ],
            [
                'id'    => 57,
                'title' => 'maintainer_delete',
            ],
            [
                'id'    => 58,
                'title' => 'maintainer_access',
            ],
            [
                'id'    => 59,
                'title' => 'tenant_create',
            ],
            [
                'id'    => 60,
                'title' => 'tenant_edit',
            ],
            [
                'id'    => 61,
                'title' => 'tenant_show',
            ],
            [
                'id'    => 62,
                'title' => 'tenant_delete',
            ],
            [
                'id'    => 63,
                'title' => 'tenant_access',
            ],
            [
                'id'    => 64,
                'title' => 'accounting_access',
            ],
            [
                'id'    => 65,
                'title' => 'expense_type_create',
            ],
            [
                'id'    => 66,
                'title' => 'expense_type_edit',
            ],
            [
                'id'    => 67,
                'title' => 'expense_type_show',
            ],
            [
                'id'    => 68,
                'title' => 'expense_type_delete',
            ],
            [
                'id'    => 69,
                'title' => 'expense_type_access',
            ],
            [
                'id'    => 70,
                'title' => 'expense_create',
            ],
            [
                'id'    => 71,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 72,
                'title' => 'expense_show',
            ],
            [
                'id'    => 73,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 74,
                'title' => 'expense_access',
            ],
            [
                'id'    => 75,
                'title' => 'documents_menu_access',
            ],
            [
                'id'    => 76,
                'title' => 'document_type_create',
            ],
            [
                'id'    => 77,
                'title' => 'document_type_edit',
            ],
            [
                'id'    => 78,
                'title' => 'document_type_show',
            ],
            [
                'id'    => 79,
                'title' => 'document_type_delete',
            ],
            [
                'id'    => 80,
                'title' => 'document_type_access',
            ],
            [
                'id'    => 81,
                'title' => 'document_create',
            ],
            [
                'id'    => 82,
                'title' => 'document_edit',
            ],
            [
                'id'    => 83,
                'title' => 'document_show',
            ],
            [
                'id'    => 84,
                'title' => 'document_delete',
            ],
            [
                'id'    => 85,
                'title' => 'document_access',
            ],
            [
                'id'    => 86,
                'title' => 'invoice_type_create',
            ],
            [
                'id'    => 87,
                'title' => 'invoice_type_edit',
            ],
            [
                'id'    => 88,
                'title' => 'invoice_type_show',
            ],
            [
                'id'    => 89,
                'title' => 'invoice_type_delete',
            ],
            [
                'id'    => 90,
                'title' => 'invoice_type_access',
            ],
            [
                'id'    => 91,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 92,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 93,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 94,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 95,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 96,
                'title' => 'income_type_create',
            ],
            [
                'id'    => 97,
                'title' => 'income_type_edit',
            ],
            [
                'id'    => 98,
                'title' => 'income_type_show',
            ],
            [
                'id'    => 99,
                'title' => 'income_type_delete',
            ],
            [
                'id'    => 100,
                'title' => 'income_type_access',
            ],
            [
                'id'    => 101,
                'title' => 'income_create',
            ],
            [
                'id'    => 102,
                'title' => 'income_edit',
            ],
            [
                'id'    => 103,
                'title' => 'income_show',
            ],
            [
                'id'    => 104,
                'title' => 'income_delete',
            ],
            [
                'id'    => 105,
                'title' => 'income_access',
            ],
            [
                'id'    => 106,
                'title' => 'application_create',
            ],
            [
                'id'    => 107,
                'title' => 'application_edit',
            ],
            [
                'id'    => 108,
                'title' => 'application_show',
            ],
            [
                'id'    => 109,
                'title' => 'application_delete',
            ],
            [
                'id'    => 110,
                'title' => 'application_access',
            ],
            [
                'id'    => 111,
                'title' => 'equipment_type_create',
            ],
            [
                'id'    => 112,
                'title' => 'equipment_type_edit',
            ],
            [
                'id'    => 113,
                'title' => 'equipment_type_show',
            ],
            [
                'id'    => 114,
                'title' => 'equipment_type_delete',
            ],
            [
                'id'    => 115,
                'title' => 'equipment_type_access',
            ],
            [
                'id'    => 116,
                'title' => 'equipment_create',
            ],
            [
                'id'    => 117,
                'title' => 'equipment_edit',
            ],
            [
                'id'    => 118,
                'title' => 'equipment_show',
            ],
            [
                'id'    => 119,
                'title' => 'equipment_delete',
            ],
            [
                'id'    => 120,
                'title' => 'equipment_access',
            ],
            [
                'id'    => 121,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
