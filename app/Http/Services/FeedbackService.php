<?php


namespace App\Http\Services;

use App\Models\Feedback;
use App\Models\UserQuries;
use App\Http\Traits\AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Services\BaseService\BaseService;
use Illuminate\Support\Facades\Hash;

class FeedbackService extends BaseService
{
    use AuthUser;
    /**
     * Display a Modal to add feedback by User.
     *
     * @return \Illuminate\Http\Response
     */
    public function addUserQueryModal(Request $request)
    {
        $user_email = $this->getAuthUser()['email'];
        $containerId = $request->input('containerId', 'common_popup_modal');
        $html = view('pages.feedback._partial._add_feedback_modal',['user_email'=>$user_email])->render();
        return $this->successResponse('success', ['html' => $html]);
    }
    /**
     * Click yes button to add feedback confirmly.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmAddUserQuery(Request $request)
    {
        $user_qurie = new UserQuries;
        $user_qurie->user_id =$this->getAuthUserId();
        $user_qurie->description = $request->feedback_description;
//        $feedback->rate_status =$request->feedback_status;
        $user_qurie->topic =$request->topic;
        $user_qurie->save();
        $user_quries = UserQuries::where('user_id',$this->getAuthUserId())->get();
        $html = view('pages.feedback._partial._feedback_list_table_html',['user_quries'=>$user_quries])->render();
        return $this->successResponse('success', ['html' => $html, 'html_section_id' => 'feedbacklist-section']);
    }
    /**
     * Admin Admin Admin Admin Admin
     * Admin Admin Admin Admin Admin
     * Admin Admin Admin Admin Admin
     *
     * Display Comment Modal for Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCommentModal(Request $request)
    {
        $user_qurie_id = $request->id;
        $containerId = $request->input('containerId', 'common_popup_modal');
        $html = view('pages.feedback._partial._add_comment_modal',['user_qurie_id'=>$user_qurie_id])->render();
        return $this->successResponse('success', ['html' => $html]);
    }
    /**
     * Click yes button to add comment confirmly.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmAddComment(Request $request)
    {
        $user_qurie = UserQuries::find($request->feedback_id);
        $user_qurie->admin_comment = $request->admin_comment;
        $user_qurie->is_view = "viewed";
        $user_qurie->save();
        $user_quries = UserQuries::all();
//        //$html = view('pages.feedback._partial._feedback_list_table_html',['feedbacks' => $feedbacks])->render();
//        return $this->successResponse('success', ['html' => $html, 'html_section_id' => 'feedbacklist-section']);
        $html = view('pages.feedback._partial._admin_feedback_list_table_html', ['user_quries' => $user_quries])->render();
        return $this->successResponse('success',['html' => $html, 'html_section_id' => 'feedbacklist-section']);
    }
    /**
     * Display a Modal to delete Feedback.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUserQueryModal(Request $request)
    {
        $user_qurie_id = $request->id;
        $containerId = $request->input('containerId', 'common_popup_modal');
        $html = view('pages.feedback._partial._delete_feedback_modal', ['id' => $containerId, 'user_qurie_id' => $user_qurie_id])->render();
        return $this->successResponse('success', ['html' => $html]);
    }
    /**
     * Click yes Button to delete feedback confirmly.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmDeleteUserQuery(Request $request)
    {
        //dd($request->all());
        $user_qurie_id = $request->user_qurie_id;
        $user_qurie_to_delete = UserQuries::where('id',$user_qurie_id)->first();
        $user_qurie_to_delete->delete();
        $user_quries = UserQuries::all();
        $html = view('pages.feedback._partial._admin_feedback_list_table_html',['user_quries'=>$user_quries])->render();
        return $this->successResponse('success', ['html' => $html, 'html_section_id' => 'feedbacklist-section']);
    }
}
