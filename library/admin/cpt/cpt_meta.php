<?php

add_action('cmb2_admin_init', 'kindergarden_post_meta_metadata');
function kindergarden_post_meta_metadata()
{

    $cmb = new_cmb2_box(array(
        'id' => 'metadata',
        'title' => __('Metadata:', 'cmb2'),
        'object_types' => array('kindergarden'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => false,

    ));

    $cmb->add_field(array(
        'name' => esc_html__('ID', 'cmb2'),
        'id' => $prefix . 'id',
        'description' => __('ID fra Vigilo.', 'cmb2'),
        'attributes' => array('placeholder' => 'ID'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('4Human', 'cmb2'),
        'id' => $prefix . '4Human',
        'description' => __('Legg til 4Human.', 'cmb2'),
        'attributes' => array('placeholder' => '4Human'),
        'type' => 'text',
    ));
    $cmb->add_field(array(
        'name' => esc_html__('IDENTIFIER', 'cmb2'),
        'id' => $prefix . 'identifier',
        'description' => __('IDENTIFIER.', 'cmb2'),
        'attributes' => array('placeholder' => 'IDENTIFIER'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Orgnr', 'cmb2'),
        'id' => $prefix . 'ognr',
        'description' => esc_html__('Legg til Orgnr.', 'cmb2'),
        'attributes' => array('placeholder' => 'Orgnr'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Antall barn', 'cmb2'),
        'id' => $prefix . 'kids_number',
        'description' => esc_html__('Legg til Antall barn.', 'cmb2'),
        'attributes' => array('placeholder' => 'Antall barn'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Åpningstider', 'cmb2'),
        'id' => $prefix . 'opening_days',
        'description' => esc_html__('Legg til åpningstider.', 'cmb2'),
        'attributes' => array('placeholder' => 'Åpningstider'),
        'type' => 'text',
    ));
}

add_action('cmb2_admin_init', 'kindergarden_post_meta_contacts');
function kindergarden_post_meta_contacts()
{

    $cmb = new_cmb2_box(array(
        'id' => 'contacts',
        'title' => __('Kontakt:', 'cmb2'),
        'object_types' => array('kindergarden'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => true,

    ));
    $cmb->add_field(array(
        'name' => esc_html__('Telefon', 'cmb2'),
        'id' => $prefix . 'phone',
        'description' => esc_html__('Legg til Telefon.', 'cmb2'),
        'attributes' => array('placeholder' => 'Telefon'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Faks', 'cmb2'),
        'id' => $prefix . 'fax',
        'description' => esc_html__('Legg til Faks.', 'cmb2'),
        'attributes' => array('placeholder' => 'Faks'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('E-post', 'cmb2'),
        'id' => $prefix . 'email',
        'description' => esc_html__('Legg til E-post.', 'cmb2'),
        'attributes' => array('placeholder' => 'E-post'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Søknad', 'cmb2'),
        'id' => $prefix . 'web',
        'description' => esc_html__('Legg til link til kommunens søknadsside.', 'cmb2'),
        'attributes' => array('placeholder' => 'Søknad'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Facebook', 'cmb2'),
        'id' => $prefix . 'facebook',
        'description' => esc_html__('Legg til Facebook url.', 'cmb2'),
        'attributes' => array('placeholder' => 'Facebook url'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Instagram', 'cmb2'),
        'id' => $prefix . 'instagram',
        'description' => esc_html__('Legg til Instagram url.', 'cmb2'),
        'attributes' => array('placeholder' => 'Instagram url'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Youtube', 'cmb2'),
        'id' => $prefix . 'youtube',
        'description' => esc_html__('Legg til Youtube url.', 'cmb2'),
        'attributes' => array('placeholder' => 'Youtube url'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Linkedin', 'cmb2'),
        'id' => $prefix . 'linkedin',
        'description' => esc_html__('Legg til Linkedin url.', 'cmb2'),
        'attributes' => array('placeholder' => 'Linkedin url'),
        'type' => 'text',
    ));
}

add_action('cmb2_admin_init', 'kindergarden_post_meta_address');
function kindergarden_post_meta_address()
{

    $cmb = new_cmb2_box(array(
        'id' => 'address',
        'title' => __('Adresse:', 'cmb2'),
        'object_types' => array('kindergarden'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => true,

    ));

    $cmb->add_field(array(
        'name' => esc_html__('Besøksadresse', 'cmb2'),
        'id' => $prefix . 'visit_address',
        'description' => esc_html__('Legg til gateadresse.', 'cmb2'),
        'attributes' => array('placeholder' => 'Besøksadresse'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Postnummer', 'cmb2'),
        'id' => $prefix . 'zip_code',
        'description' => esc_html__('Legg til Postnummer.', 'cmb2'),
        'attributes' => array('placeholder' => 'Postnummer'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Fylke', 'cmb2'),
        'id' => $prefix . 'fylke',
        'description' => esc_html__('Legg til Fylke.', 'cmb2'),
        'attributes' => array('placeholder' => 'Fylke'),
        'type' => 'select',
        'show_option_none' => true,
        //'default'          => 'custom',
        'options'          => array(
		'Agder'     => __( 'Agder', 'cmb2' ),
            	'Innlandet'     => __( 'Innlandet', 'cmb2' ),
          	'Møre og Romsdal'     => __( 'Møre og Romsdal', 'cmb2' ),
		'Nordland'     => __( 'Nordland', 'cmb2' ),
		'Oslo'     => __( 'Oslo', 'cmb2' ),
           	'Rogaland'     => __( 'Rogaland', 'cmb2' ),
            	'Troms og Finnmark'     => __( 'Troms og Finnmark', 'cmb2' ),
            	'Trøndelag'   => __( 'Trøndelag', 'cmb2' ),
            	'Vestfold-og-Telemark'     => __( 'Vestfold og Telemark', 'cmb2' ),
            	'Vestland'     => __( 'Vestland', 'cmb2' ),
            	'Viken'     => __( 'Viken', 'cmb2' ),
        ),
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Sted', 'cmb2'),
        'id' => $prefix . 'postal_place',
        'description' => esc_html__('Legg til Sted.', 'cmb2'),
        'attributes' => array('placeholder' => 'Sted'),
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Besøk område', 'cmb2'),
        'id' => $prefix . 'visit_area',
        'description' => esc_html__('Legg til breddegrad og lengdegrad.', 'cmb2'),
        'type' => 'pw_map',
        'split_values' => true, // Save latitude and longitude as two separate fields
    ));

}

add_action('cmb2_admin_init', 'kindergarden_role');
function kindergarden_role()
{
    $cmb_group = new_cmb2_box(array(
        'id' => 'role',
        'title' => esc_html__('Avdeling', 'cmb2'),
        'object_types' => array('kindergarden'),
        'closed' => true,
    ));

    $group_field_id = $cmb_group->add_field(array(
        'id' => $prefix . 'role',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('Avdeling {#}', 'cmb2'),
            'add_button' => esc_html__('Legg til en annen Avdeling    ', 'cmb2'),
            'remove_button' => esc_html__('Fjern Avdeling    ', 'cmb2'),
            'sortable' => true,

        ),
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Tittel', 'cmb2'),
        'description' => esc_html__('Legg til tittel.', 'cmb2'),
        'id' => 'role_title',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Avdeling ID', 'cmb2'),
        'description' => esc_html__('Legg Avdeling ID.', 'cmb2'),
        'id' => 'avdeling_id',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Telefon', 'cmb2'),
        'desc' => esc_html__('Legg til Telefon .', 'cmb2'),
        'id' => 'personel_telefon',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => 'Detaljer for  Våre Ansatte',
        'desc' => 'Legg til bio',
        'id' => 'role_details',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => true,
            'textarea_name' => $editor_id,
            'textarea_rows' => get_option('default_post_edit_rows', 10),
            'tabindex' => '',
            'editor_css' => '',
            'editor_class' => '',
            'teeny' => false,
            'dfw' => false,
            'tinymce' => true,
            'quicktags' => true,
        ),
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Alder', 'cmb2'),
        'description' => esc_html__('Legg til aldersgruppe', 'cmb2'),
        'id' => 'age_from',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Tekst', 'cmb2'),
        'description' => esc_html__('Legg til tekst.', 'cmb2'),
        'id' => 'tekst',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Antall voksne', 'cmb2'),
        'description' => esc_html__('Legg til Antall voksne.', 'cmb2'),
        'id' => 'number_of_adults',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Antall barn', 'cmb2'),
        'description' => esc_html__('Legg til Antall barn.', 'cmb2'),
        'id' => 'number_of_kids',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Alder', 'cmb2'),
        'description' => esc_html__('Legg til aldersgruppe', 'cmb2'),
        'id' => 'age_from',
        'type' => 'text',
    ));

}

add_action('cmb2_admin_init', 'kindergarden_personell');
function kindergarden_personell()
{
    $cmb_group = new_cmb2_box(array(
        'id' => $prefix . 'personell',
        'title' => esc_html__('Personellinformasjon', 'cmb2'),
        'object_types' => array('kindergarden'),
        'closed' => true,
    ));

    $group_field_id = $cmb_group->add_field(array(
        'id' => $prefix . 'personell',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('Personell {#}', 'cmb2'),
            'add_button' => esc_html__('Legg til en annen personell    ', 'cmb2'),
            'remove_button' => esc_html__('Fjern personell    ', 'cmb2'),
            'sortable' => true,

        ),
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Navn', 'cmb2'),
        'description' => esc_html__('Legg til navn', 'cmb2'),
        'id' => 'name',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Tittel', 'cmb2'),
        'description' => esc_html__('Legg til tittel.', 'cmb2'),
        'id' => 'title',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('HumanId', 'cmb2'),
        'desc' => esc_html__('Employeeid.', 'cmb2'),
        'id' => $prefix . 'humanid',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Bilde', 'cmb2'),
        'desc' => esc_html__('Last opp bildet av personen.', 'cmb2'),
        'id' => $prefix . 'person_image',
        'type' => 'file',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Rolle', 'cmb2'),
        'desc' => esc_html__('Legg til Rolle.', 'cmb2'),
        'placeholder' => esc_html__('Rolle.', 'cmb2'),
        'id' => 'employee_rolle',
        'type' => 'select',
        'default' => '--',
        'show_option_none' => true,
        'options' => array(
            'Styrer' => __('Styrer', 'cmb2'),
            'Fagpedagog' => __('Fagpedagog', 'cmb2'),
        ),
    ));

    $roles = [];
    $personal_informs = get_post_meta($_GET['post'], 'role', true);
    if ($personal_informs) {
        foreach ($personal_informs as $key => $personal_inform) {
            $roles[$personal_inform['role_title']] = $personal_inform['role_title'];

        }
    }
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Avdeling', 'cmb2'),
        'desc' => esc_html__('Legg til avdeling.', 'cmb2'),
        'id' => 'role',
        'type' => 'select',
        'default' => 'Avdelinden',
        'options' => $roles,
    ));
    //     $terms = get_terms("kindergarden_department");
    //     $array=[];
    //     foreach ( $terms as $term ) {
    //       $array[$term->name] = $term->name;
    //     }
    // $cmb_group->add_group_field($group_field_id, array(
    //     'name' => esc_html__('Avdeling', 'cmb2'),
    //     'desc' => esc_html__('Legg til Avdeling.', 'cmb2'),
    //     'id' => 'department_name',
    //     'type' => 'select',
    //     'options' => $array,

    // ));


    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Telefon', 'cmb2'),
        'desc' => esc_html__('Legg til Telefon .', 'cmb2'),
        'id' => 'personel_telefon',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Epost ', 'cmb2'),
        'desc' => esc_html__('Legg til Epost .', 'cmb2'),
        'id' => 'personel_email',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => 'Detaljer for ansattes rolle',
        'desc' => 'Legg til Detaljer for ansattes rolle',
        'id' => 'content_for_ansatte',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => true,
            'textarea_name' => $editor_id,
            'textarea_rows' => get_option('default_post_edit_rows', 10),
            'tabindex' => '',
            'editor_css' => '',
            'editor_class' => '',
            'teeny' => false,
            'dfw' => false,
            'tinymce' => true,
            'quicktags' => true,
        ),
    ));

}

// styrer meta data//
add_action('cmb2_admin_init', 'kindergarden_styrer');
function kindergarden_styrer()
{
    $cmb_group = new_cmb2_box(array(
        'id' => 'espira_styrer',
        'title' => esc_html__('Styrer', 'cmb2'),
        'object_types' => array('kindergarden'),
        'closed' => true,
    ));

    $group_field_id = $cmb_group->add_field(array(
        'id' => 'espira_styrer',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('Personell {#}', 'cmb2'),
            'add_button' => esc_html__('Legg til en annen personell    ', 'cmb2'),
            'remove_button' => esc_html__('Fjern personell    ', 'cmb2'),
            'sortable' => true,

        ),
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Navn', 'cmb2'),
        'description' => esc_html__('Legg til navn', 'cmb2'),
        'id' => 'styrer_name',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Tittel', 'cmb2'),
        'description' => esc_html__('Legg til tittel.', 'cmb2'),
        'id' => 'styrer_title',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('HumanId', 'cmb2'),
        'desc' => esc_html__('Employeeid.', 'cmb2'),
        'id' => 'styrer_humanid',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Bilde', 'cmb2'),
        'desc' => esc_html__('Last opp bildet av personen.', 'cmb2'),
        'id' => 'styrer_person_image',
        'type' => 'file',
    ));

    // $cmb_group->add_group_field($group_field_id, array(
    //     'name' => esc_html__('Rolle', 'cmb2'),
    //     'desc' => esc_html__('Legg til Rolle.', 'cmb2'),
    //     'placeholder' => esc_html__('Rolle.', 'cmb2'),
    //     'id' => 'styrer_employee_rolle',
    //     'type' => 'select',
    //     'default' => '--',
    //     'show_option_none' => true,
    //     'options' => array(
    //         'Styrer' => __('Styrer', 'cmb2'),
    //         'Fagpedagog' => __('Fagpedagog', 'cmb2'),
    //     ),
    // ));

    // $roles = [];
    // $personal_informs = get_post_meta($_GET['post'], 'role', true);
    // if ($personal_informs) {
    //     foreach ($personal_informs as $key => $personal_inform) {
    //         $roles[$personal_inform['role_title']] = $personal_inform['role_title'];

    //     }
    // }
    // $cmb_group->add_group_field($group_field_id, array(
    //     'name' => esc_html__('Avdeling', 'cmb2'),
    //     'desc' => esc_html__('Legg til avdeling.', 'cmb2'),
    //     'id' => 'role',
    //     'type' => 'select',
    //     'default' => 'Avdelinden',
    //     'options' => $roles,
    // ));
    //     $terms = get_terms("kindergarden_department");
    //     $array=[];
    //     foreach ( $terms as $term ) {
    //       $array[$term->name] = $term->name;
    //     }
    // $cmb_group->add_group_field($group_field_id, array(
    //     'name' => esc_html__('Avdeling', 'cmb2'),
    //     'desc' => esc_html__('Legg til Avdeling.', 'cmb2'),
    //     'id' => 'department_name',
    //     'type' => 'select',
    //     'options' => $array,

    // ));


    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Telefon', 'cmb2'),
        'desc' => esc_html__('Legg til Telefon .', 'cmb2'),
        'id' => 'styrer_telefon',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Epost ', 'cmb2'),
        'desc' => esc_html__('Legg til Epost .', 'cmb2'),
        'id' => 'styrer_email',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => 'Detaljer for ansattes rolle',
        'desc' => 'Legg til Detaljer for ansattes rolle',
        'id' => 'styrer_ansatte',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true,
            'media_buttons' => true,
            'textarea_name' => $editor_id,
            'textarea_rows' => get_option('default_post_edit_rows', 10),
            'tabindex' => '',
            'editor_css' => '',
            'editor_class' => '',
            'teeny' => false,
            'dfw' => false,
            'tinymce' => true,
            'quicktags' => true,
        ),
    ));

}

add_action('cmb2_admin_init', 'kindergarden_Plan');
function kindergarden_Plan()
{

    $cmb_group = new_cmb2_box(array(
        'id' => $prefix . 'Plan',
        'title' => esc_html__('Planinformasjon', 'cmb2'),
        'object_types' => array('kindergarden'),
        'closed' => true,
    ));
    $cmb_group->add_field(array(
        'name' => 'Årsplan ',
        'id' => 'pdf_one',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text' => array(
            'add_upload_file_text' => 'Last opp PDf eller Årsplan ',
        ),
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'large',
    ));

    $cmb_group->add_field(array(
        'name' => 'Vedtekter',
        'id' => 'pdf_two',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text' => array(
            'add_upload_file_text' => 'Last opp PDf eller Vedtekter. ',
        ),
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'large',
    ));
    $group_field_id = $cmb_group->add_field(array(
        'id' => $prefix . 'Plan',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('Plan {#}', 'cmb2'),
            'add_button' => esc_html__('Legg til en annen Plan    ', 'cmb2'),
            'remove_button' => esc_html__('Fjern Plan    ', 'cmb2'),
            'sortable' => true,
            'closed' => true,
        ),
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Tittel', 'cmb2'),
        'description' => esc_html__('Legg til tittel.', 'cmb2'),
        'id' => 'title',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Tekst', 'cmb2'),
        'description' => esc_html__('Legg til Tekst', 'cmb2'),
        'id' => 'tekst',
        'type' => 'text',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Sorteringsrekkefølge', 'cmb2'),
        'description' => esc_html__('Legg til Sorteringsrekkefølge', 'cmb2'),
        'id' => 'sort_order',
        'type' => 'select',
        'show_option_none' => true,
        'default' => 'custom',
        'options' => array(
            'one' => __('1', 'cmb2'),
            'two' => __('2', 'cmb2'),
            'three' => __('3', 'cmb2'),
            'four' => __('4', 'cmb2'),
            'five' => __('5', 'cmb2'),
            'six' => __('6', 'cmb2'),
            'seven' => __('7', 'cmb2'),
            'eight' => __('8', 'cmb2'),
            'nine' => __('9', 'cmb2'),
            'ten' => __('10', 'cmb2'),
        ),
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Bilde', 'cmb2'),
        'desc' => esc_html__('Last opp bilde for plan.', 'cmb2'),
        'id' => $prefix . 'plan_image',
        'type' => 'file',
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Ikon', 'cmb2'),
        'desc' => esc_html__('Last opp ikon for plan.', 'cmb2'),
        'id' => $prefix . 'plan_icon',
        'type' => 'file',
    ));
}

// add_action('cmb2_admin_init', 'kindergarden_Avdeling');
// function kindergarden_Avdeling()
// {

//     $cmb_group = new_cmb2_box(array(
//         'id' => $prefix . 'Avdeling',
//         'title' => esc_html__('Old_Avdelinger', 'cmb2'),
//         'object_types' => array('kindergarden'),
//         'closed' => true,
//     ));

//     $group_field_id = $cmb_group->add_field(array(
//         'id' => $prefix . 'Avdeling',
//         'type' => 'group',
//         'options' => array(
//             'group_title' => esc_html__('Avdeling {#}', 'cmb2'),
//             'add_button' => esc_html__('Legg til en annen Avdeling    ', 'cmb2'),
//             'remove_button' => esc_html__('Fjern Avdeling    ', 'cmb2'),
//             'sortable' => true,
//             'closed' => true,
//         ),
//     ));

//     $cmb_group->add_group_field($group_field_id, array(
//         'name' => esc_html__('Navn', 'cmb2'),
//         'description' => esc_html__('Legg til tittel.', 'cmb2'),
//         'id' => 'name',
//         'type' => 'text',
//     ));

//     $cmb_group->add_group_field($group_field_id, array(
//         'name' => esc_html__('Alder', 'cmb2'),
//         'description' => esc_html__('Legg til aldersgruppe', 'cmb2'),
//         'id' => 'age_from',
//         'type' => 'text',
//     ));
//     $cmb_group->add_group_field($group_field_id, array(
//         'name' => esc_html__('Tekst', 'cmb2'),
//         'description' => esc_html__('Legg til tekst.', 'cmb2'),
//         'id' => 'tekst',
//         'type' => 'text',
//     ));
//     $cmb_group->add_group_field($group_field_id, array(
//         'name' => esc_html__('Bilde', 'cmb2'),
//         'desc' => esc_html__('Last opp bilde for Avdeling.', 'cmb2'),
//         'id' => $prefix . 'department_image',
//         'type' => 'file',
//     ));

//     $cmb_group->add_group_field($group_field_id, array(
//         'name' => esc_html__('Antall voksne', 'cmb2'),
//         'description' => esc_html__('Legg til Antall voksne.', 'cmb2'),
//         'id' => 'number_of_adults',
//         'type' => 'text',
//     ));
//     $cmb_group->add_group_field($group_field_id, array(
//         'name' => esc_html__('Antall barn', 'cmb2'),
//         'description' => esc_html__('Legg til Antall barn.', 'cmb2'),
//         'id' => 'number_of_kids',
//         'type' => 'text',
//     ));

// }

add_action('cmb2_admin_init', 'kindergarden_meals');
function kindergarden_meals()
{
    $cmb_group = new_cmb2_box(array(
        'id' => $prefix . 'meals',
        'title' => esc_html__('Informasjon Om Måltider', 'cmb2'),
        'object_types' => array('kindergarden'),
        'closed' => true,
    ));
    $group_field_id = $cmb_group->add_field(array(
        'id' => $prefix . 'meals',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('Måltider {#}', 'cmb2'),
            'add_button' => esc_html__('Legg til en annen Måltider    ', 'cmb2'),
            'remove_button' => esc_html__('Fjern Måltider', 'cmb2'),
            'sortable' => true,
            'closed' => true,
        ),
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Navn', 'cmb2'),
        'description' => esc_html__('Legg til Navn.', 'cmb2'),
        'id' => 'meal_name',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Beskrivelse', 'cmb2'),
        'description' => esc_html__('Legg til Alder Beskrivelse', 'cmb2'),
        'id' => 'meal_description',
        'type' => 'textarea',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Dato og tid', 'cmb2'),
        'description' => esc_html__('Legg til Dato og tid', 'cmb2'),
        'id' => 'meal_date_time',
        'type' => 'text_datetime_timestamp',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Ingredienser', 'cmb2'),
        'description' => esc_html__('Legg til Ingredienser.', 'cmb2'),
        'id' => 'meal_ingredients',
        'type' => 'textarea',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Type', 'cmb2'),
        'description' => esc_html__('Legg til Type.', 'cmb2'),
        'id' => 'meal_type',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Bilde', 'cmb2'),
        'desc' => esc_html__('Last opp bilde for Måltider.', 'cmb2'),
        'id' => $prefix . 'department_image',
        'type' => 'file',
    ));
}

add_action('cmb2_admin_init', 'kindergarden_activities');
function kindergarden_activities()
{
    $cmb_group = new_cmb2_box(array(
        'id' => $prefix . 'activities',
        'title' => esc_html__('Åktiviteterinformasjon', 'cmb2'),
        'object_types' => array('kindergarden'),
        'closed' => true,
    ));
    $group_field_id = $cmb_group->add_field(array(
        'id' => $prefix . 'activities',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('aktiviteter {#}', 'cmb2'),
            'add_button' => esc_html__('Legg til en annen aktiviteter    ', 'cmb2'),
            'remove_button' => esc_html__('Fjern aktiviteter', 'cmb2'),
            'sortable' => true,
            'closed' => true,
        ),
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Navn', 'cmb2'),
        'description' => esc_html__('Legg til Navn.', 'cmb2'),
        'id' => 'activities_name',
        'type' => 'text',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Beskrivelse', 'cmb2'),
        'description' => esc_html__('Legg til Alder Beskrivelse', 'cmb2'),
        'id' => 'activities_description',
        'type' => 'textarea',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Dato og tid', 'cmb2'),
        'description' => esc_html__('Legg til Dato og tid', 'cmb2'),
        'id' => 'activities_date_time',
        'type' => 'text_date_timestamp',
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Sted', 'cmb2'),
        'description' => esc_html__('Legg til Sted.', 'cmb2'),
        'id' => 'activities_place',
        'type' => 'text',
    ));
}

add_action('cmb2_admin_init', 'nutrition_details');
function nutrition_details()
{
    $cmb_group = new_cmb2_box(array(
        'id' => 'nutrition_detail',
        'title' => esc_html__('Om Ernæring Og Beskrivelse', 'cmb2'),
        'object_types' => array('kindergarden'),
        'closed' => true,
    ));


    // $cmb_group->add_field(array(
    //     'name' => esc_html__('Detalj', 'cmb2'),
    //     'id' => 'nutrition_detail',
    //     'description' => esc_html__('Legg til Detalj om ernæring.', 'cmb2'),
    //     'attributes' => array('placeholder' => 'Detalj om ernæring'),
    //     'type' => 'textarea_small',
    // ));

    // $cmb_group->add_field(array(
    //     'name' => 'Legg til liste:',
    //     'id' => 'nutrition_points',
    //     'type' => 'text',
    //     'repeatable' => true,
    // ));

    $cmb_group->add_field(array(
        'name' => esc_html__('Kost-penger', 'cmb2'),
        'id' => $prefix . 'cost',
        'description' => esc_html__('Legg til Kost-penger.', 'cmb2'),
        'attributes' => array('placeholder' => 'Kost-penger'),
        'type' => 'text',
    ));

}

add_action('cmb2_admin_init', 'kindergarden_images');
function kindergarden_images()
{
    $cmb = new_cmb2_box(array(
        'id' => 'gallaries',
        'title' => __('Bilde Gallerier', 'cmb2'),
        'object_types' => array('kindergarden'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => true,

    ));

    $cmb->add_field(array(
        'name' => esc_html__('Feature Bilder', 'cmb2'),
        'desc' => esc_html__('Last opp eller legg til flere bilder.', 'cmb2'),
        'id' => $prefix . 'feature_galleries',
        'type' => 'file_list',
        'preview_size' => array(100, 100),
    ));
    $cmb->add_field(array(
        'name' => esc_html__('Daglige bilder', 'cmb2'),
        'desc' => esc_html__('Last opp eller legg til Daglige bilder.', 'cmb2'),
        'id' => 'daily_galleries',
        'type' => 'file_list',
        'preview_size' => array(100, 100),
    ));
    $cmb->add_field(array(
        'name' => esc_html__('Video linke', 'cmb2'),
        'desc' => esc_html__('Legg til lenke for video for header.', 'cmb2'),
        'id' => 'video_link',
        'type' => 'text',
    ));
    
    $cmb->add_field(array(
        'name' => esc_html__('Video links', 'cmb2'),
        'desc' => esc_html__('Last opp bare videoer  .', 'cmb2'),
        'id' => 'own_video_linker',
        'type' => 'file_list',
        'query_args' => array(
            'type' => array('video')),
    ));



    $blog_group_id = $cmb->add_field( array(
        'id'          => 'video_links',
        'type'        => 'group',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => 'Legg til videolink {#}',
            'add_button'    => 'Legg til en ny video',
            'remove_button' => 'Fjern video',
            'closed'        => true,  // Repeater fields closed by default - neat & compact.
            'sortable'      => true,  // Allow changing the order of repeated groups.
        ),
    ) );
    $cmb->add_group_field( $blog_group_id, array(
        'name' => esc_html__('Video linke', 'cmb2'),
        'desc' => esc_html__('Legg til videolink for galleri.', 'cmb2'),
        'id' => 'body_videolink',
        'type' => 'oembed'
    ) );
    $cmb->add_group_field( $blog_group_id, array(
        'name' => esc_html__('Video Title', 'cmb2'),
        'desc' => esc_html__('Legg til videotittel', 'cmb2'),
        'id' => 'body_videotitle',
        'type' => 'text'
    ) );
}

add_action('cmb2_admin_init', 'kindergarden_iframes');
function kindergarden_iframes()
{

    $cmb = new_cmb2_box(array(
        'id' => 'statistics_iframe',
        'title' => __('Legg til Iframe for statistikk    :', 'cmb2'),
        'object_types' => array('kindergarden'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => true,

    ));
    $cmb->add_field(array(
        'name' => esc_html__('Foreldretilfredshet', 'cmb2'),
        'id' => 'parent_iframe',
        'attributes' => array('placeholder' => 'Legg til Foreldretilfredshet.'),
        'description' => esc_html__('Legg til Foreldretilfredshet.', 'cmb2'),
        'type' => 'textarea_code',
    ));
    $cmb->add_field(array(
        'name' => esc_html__('Andel ansatte med barnehagelaererytdanning', 'cmb2'),
        'id' => 'employees_iframe',
        'attributes' => array('placeholder' => 'Legg til Andel ansatte med barnehagelaererytdanning.'),
        'description' => esc_html__('Legg til Andel ansatte med barnehagelaererytdanning.', 'cmb2'),
        'type' => 'textarea_code',
    ));
    $cmb->add_field(array(
        'name' => esc_html__('Barn per ansatt', 'cmb2'),
        'id' => 'children_per_employee_iframe',
        'attributes' => array('placeholder' => 'Legg til Andel Barn per ansatt.'),
        'description' => esc_html__('Legg til Andel Barn per ansatt.', 'cmb2'),
        'type' => 'textarea_code',
    ));
    $cmb->add_field(array(
        'name' => esc_html__('Ansattes utdanning', 'cmb2'),
        'id' => 'employee_education_iframe',
        'attributes' => array('placeholder' => 'Legg til Ansattes utdanning.'),
        'description' => esc_html__('Ansattes utdanning.', 'cmb2'),
        'type' => 'textarea_code',
    ));
}

add_action('cmb2_admin_init', 'kindergarden_apent');
function kindergarden_apent()
{
    $cmb = new_cmb2_box(array(
        'id' => 'apent_hus',
        'title' => __('Åpent Hus:', 'cmb2'),
        'object_types' => array('kindergarden'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => true,

    ));
    $cmb->add_field(array(
        'name' => 'Detalj for åpent hus',
        'id' => 'detail_open_visiting',
        'type' => 'text',
    ));
    $cmb->add_field(array(
        'name' => 'Legg til dato for åpent hus    ',
        'id' => 'open_date_visiting',
        'type' => 'text',
        'repeatable' => true,
    ));
    $cmb->add_field(array(
        'name' => 'Upload Background Image',
        'desc' => 'Upload an image or enter an URL.',
        'id' => 'visiting_hour_bg',
        'type' => 'file',
        // Optional:
        'options' => array(
            'url' => false,
        ),
        'text' => array(
            'add_upload_file_text' => 'Add Image',
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
        'preview_size' => 'large',
    ));
}

add_action('cmb2_admin_init', 'kindergarden_samarbeidsutvalg');
function kindergarden_samarbeidsutvalg()
{

    $cmb = new_cmb2_box(array(
        'id' => 'samarbeidsutvalg',
        'title' => __('Samarbeidsutvalg:', 'cmb2'),
        'object_types' => array('kindergarden'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => true,

    ));

    $cmb->add_field(array(
        'name' => esc_html__('Beskrivelse', 'cmb2'),
        'id' => 'samarbeidsutvalg_description',
        'description' => esc_html__('Legg til beskrivelse.', 'cmb2'),
        'type' => 'textarea',
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Linke', 'cmb2'),
        'id' => 'samarbeidsutvalg_link',
        'description' => esc_html__('Legg til lenke.', 'cmb2'),
        'type' => 'text',
    ));
}
// Meta fields for Nyheter Post Type
// add_action( 'cmb2_admin_init', 'nyheter_excerpt_field' );
function nyheter_meta_fields() {

    $side_arr = [];
   foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { 

    $side_arr[$sidebar['id']] = $sidebar['name'];
      
   } 

	$cmb = new_cmb2_box( array(
		'id'           => 'nyheter_meta_fields',
		'title'        => 'Sidebar Opton ',
        'object_types' => array( 'post' ),
	) );

    $cmb->add_field( array(
        'name'             => 'Right Sidebar',
        'desc'             => 'Select sidebar to show on right.',
        'id'               => 'right_sidebar',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'custom',
        'options'          => $side_arr
    ) );

    $cmb->add_field( array(
        'name'             => 'Left Sidebar',
        'desc'             => 'Select sidebar to show on left.',
        'id'               => 'left_sidebar',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'custom',
        'options'          =>  $side_arr
    ) );
}
add_action( 'cmb2_admin_init', 'nyheter_meta_fields' );

add_action('cmb2_admin_init', 'nyheter_gallery');
function nyheter_gallery()
{
	$cmb = new_cmb2_box( array(
		'id'           => 'nyheter_gallery',
		'title'        => 'Videos',
        'object_types' => array( 'post' ),
	) );
    $cmb->add_field(array(
        'name' => esc_html__('Video links', 'cmb2'),
        'desc' => esc_html__('Last opp bare videoer  .', 'cmb2'),
        'id' => 'nyheter_video_link',
        'type' => 'file_list',
        'query_args' => array(
            'type' => array('video')),
    ));
    
    $cmb->add_field(array(
        'name' => 'Legg til videolinker',
        'id' => 'news_video_links',
        'type' => 'text',
        'repeatable' => true,
    ));
}