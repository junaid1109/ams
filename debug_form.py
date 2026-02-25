#!/usr/bin/env python3
import urllib.request
import urllib.error

try:
    url = 'http://localhost:9000/admin/home-sections/1/edit'
    request = urllib.request.Request(url)
    
    try:
        with urllib.request.urlopen(request) as response:
            status = response.status
            html = response.read().decode('utf-8')
            print(f"Status: {status}")
            print(f"Content length: {len(html)}")
            
            # Check if redirected to login
            if 'login' in html.lower() or 'unauthorized' in html.lower():
                print("\n✗ Redirected to login page - authentication required")
            elif '404' in html or 'not found' in html.lower():
                print("\n✗ 404 Not Found")
            elif 'error' in html.lower():
                print("\n✗ Error page returned")
            else:
                print("\n✓ Page loaded successfully")
                
                # Print first 500 chars to see what's there
                print("\nFirst 500 characters:")
                print(html[:500] + "...\n")
                
                # Look for the form
                if '<form' in html:
                    print("✓ Form found in page")
                else:
                    print("✗ No form found in page")
                    
                # Look for content field
                if 'content' in html.lower():
                    print("✓ 'content' field found")
                    idx = html.lower().find('content')
                    print(f"  Context: ...{html[max(0, idx-100):idx+150]}...")
                else:
                    print("✗ No 'content' field found")
    except urllib.error.HTTPError as e:
        print(f"HTTP Error {e.code}: {e.reason}")
        content = e.read().decode('utf-8')
        print("Response:", content[:500])
            
except Exception as e:
    print(f"ERROR: {e}")
    import traceback
    traceback.print_exc()
