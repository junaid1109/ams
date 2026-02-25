#!/usr/bin/env python3
import urllib.request
import urllib.error
import re

try:
    url = 'http://localhost:9000/admin/home-sections/1/edit'
    print(f"Fetching: {url}\n")
    
    with urllib.request.urlopen(url) as response:
        html = response.read().decode('utf-8')
    
    # Look for key indicators
    has_success_msg = '3 stat(s) found' in html
    has_no_stats = 'No stats yet' in html
    has_stat_groups = 'stat-item-group' in html
    has_500plus = '500+' in html
    has_98percent = '98%' in html
    has_10years = '10+' in html
    
    print("✓ Testing Hero Section Edit Form\n")
    print(f"  Found '3 stat(s) found' message: {has_success_msg}")
    print(f"  Found 'No stats yet' message: {has_no_stats}")
    print(f"  Has stat-item-group divs: {has_stat_groups}")
    print(f"  Contains '500+' stat: {has_500plus}")
    print(f"  Contains '98%' stat: {has_98percent}")
    print(f"  Contains '10+' stat: {has_10years}")
    
    if has_success_msg and has_stat_groups and has_500plus:
        print("\n✓ SUCCESS: Hero section stats are displaying correctly!")
    else:
        print("\n✗ ERROR: Stats not displaying correctly")
        # Show relevant HTML
        print("\nRelevant HTML sections:")
        for match in re.finditer(r'<div[^>]*stat[^>]*>.*?</div>', html, re.DOTALL):
            print(match.group()[:200] + "...")
    
    # Test About section too
    print("\n" + "="*50)
    url2 = 'http://localhost:9000/admin/home-sections/2/edit'
    print(f"Fetching: {url2}\n")
    
    with urllib.request.urlopen(url2) as response:
        html2 = response.read().decode('utf-8')
    
    has_15years = '15' in html2
    has_850projects = '850' in html2
    has_240clients = '240' in html2
    has_about_stats = '3 stat(s) found' in html2
    
    print("✓ Testing About Section Edit Form\n")
    print(f"  Found '3 stat(s) found' message: {has_about_stats}")
    print(f"  Contains '15' stat: {has_15years}")
    print(f"  Contains '850' stat: {has_850projects}")
    print(f"  Contains '240' stat: {has_240clients}")
    
    if has_about_stats and has_15years and has_850projects and has_240clients:
        print("\n✓ SUCCESS: About section stats are displaying correctly!")
    else:
        print("\n✗ ERROR: About stats not displaying correctly")
        
except urllib.error.URLError as e:
    print(f"ERROR: Could not connect to server: {e}")
except Exception as e:
    print(f"ERROR: {e}")
