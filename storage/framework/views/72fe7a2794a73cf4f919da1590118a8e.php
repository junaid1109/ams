

<?php $__env->startSection('title', 'Edit Page - Admin'); ?>
<?php $__env->startSection('page-title', 'Edit Page'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Page</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="<?php echo e(route('admin.pages.update', $page)); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title', $page->title)); ?>" required>
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Page Type</label>
            <select name="page_type" class="form-control <?php $__errorArgs = ['page_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
              <option value="static" <?php if(old('page_type', $page->page_type) == 'static'): ?> selected <?php endif; ?>>Static</option>
              <option value="about" <?php if(old('page_type', $page->page_type) == 'about'): ?> selected <?php endif; ?>>About</option>
              <option value="terms" <?php if(old('page_type', $page->page_type) == 'terms'): ?> selected <?php endif; ?>>Terms</option>
              <option value="privacy" <?php if(old('page_type', $page->page_type) == 'privacy'): ?> selected <?php endif; ?>>Privacy</option>
            </select>
            <?php $__errorArgs = ['page_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Content *</label>
            <textarea id="content-editor" name="content" class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="10"><?php echo e(old('content', $page->content)); ?></textarea>
            <div id="content-error" class="invalid-feedback" style="display: none;">Content is required</div>
            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Image</label>
            <?php if($page->image): ?>
            <div class="mb-2">
              <img src="<?php echo e(asset('storage/' . $page->image)); ?>" alt="Page" style="max-width: 200px;">
            </div>
            <?php endif; ?>
            <input type="file" name="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="2"><?php echo e(old('meta_description', $page->meta_description)); ?></textarea>
            <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" name="meta_keywords" class="form-control <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('meta_keywords', $page->meta_keywords)); ?>">
            <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="published" value="1" <?php if(old('published', $page->published)): ?> checked <?php endif; ?>>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Page</button>
          <a href="<?php echo e(route('admin.pages.index')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  let contentEditor;

  class CustomUploadAdapter {
    constructor(loader) {
      this.loader = loader;
    }

    upload() {
      return this.loader.file.then(file => new Promise((resolve, reject) => {
        const formData = new FormData();
        formData.append('upload', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        fetch('<?php echo e(route("admin.upload.image")); ?>', {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.url) {
            resolve({ default: data.url });
          } else {
            reject('Upload failed');
          }
        })
        .catch(error => reject(error));
      }));
    }

    abort() {
      // Abort upload
    }
  }

  ClassicEditor.create(document.querySelector('#content-editor'), {
    toolbar: {
      items: [
        'heading', '|',
        'bold', 'italic', 'underline', 'strikethrough', '|',
        'bulletedList', 'numberedList', '|',
        'link', 'imageUpload', 'blockQuote', 'codeBlock', '|',
        'insertTable', '|',
        'undo', 'redo'
      ]
    },
    heading: {
      options: [
        { model: 'paragraph', title: 'Paragraph' },
        { model: 'heading1', view: 'h1', title: 'Heading 1' },
        { model: 'heading2', view: 'h2', title: 'Heading 2' },
        { model: 'heading3', view: 'h3', title: 'Heading 3' }
      ]
    }
  })
  .then(editor => {
    contentEditor = editor;
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
      return new CustomUploadAdapter(loader);
    };
  })
  .catch(err => console.error('Content Editor:', err));

  // Sync editor data back to textarea before form submission
  document.querySelector('form').addEventListener('submit', function(e) {
    if (contentEditor) {
      const content = contentEditor.getData();
      document.querySelector('#content-editor').value = content;
      
      // Validate content is not empty
      if (!content || content.trim() === '') {
        e.preventDefault();
        document.getElementById('content-error').style.display = 'block';
        document.querySelector('.form-group').classList.add('has-error');
        return false;
      } else {
        document.getElementById('content-error').style.display = 'none';
        document.querySelector('.form-group').classList.remove('has-error');
      }
    }
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/pages/edit.blade.php ENDPATH**/ ?>